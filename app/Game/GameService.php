<?php

declare(strict_types=1);

namespace App\Game;

use App\Contracts\Game\GameContract;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use phpcent\Client;

class GameService implements GameContract
{
    protected Client $centrifugo;

    public function __construct(Client $centrifugo)
    {
        $this->centrifugo = $centrifugo;
    }

    public function distribute(int $id): void
    {
        $room = Room::query()->find($id);
        $deck = (new Deck($room->ready_state->toArray()));
        Room::query()->find($id)->update([
            'deck' => collect([
                'cards' => $deck->getCards(),
                'players' => $deck->getPlayers(),
                'table' => [],
                'trump' => $deck->getTrumpCard()->getSuit(),
            ]),
        ]);

        $this->centrifugo->publish('room', [
            'deck' => $deck->getCards(),
            'players' => $deck->getPlayers(),
            'event' => 'game_started',
        ]);
    }

    public function takeFromDeck(int $id, int $player): array
    {
        $room = Room::query()->find($id);

        $card = $room->deck->get('cards')[0];
        $playerCards = $room->deck->get('players')[$player];
        $playerCards[] = strtolower($card['rank'].$card['suit'][0]);
        $players = $room->deck->get('players');
        $players[$player] = $playerCards;
        $card = strtolower($card['rank'].$card['suit'][0]);
        $this->centrifugo->publish('room', [
            'card' => $card,
            'event' => 'player_take_card',
            'player' => $player,
        ]);

        unset($room->deck->get('cards')[0]);
        $room->update([
            'deck' => collect([
                'cards' => $room->deck->get('cards'),
                'players' => $players,
                'table' => [],
                'trump' => last($room->deck->get('cards'))['suit'],
            ]),
        ]);

        return $players[$player];
    }

    public function beat(string $fightCard, string $card, Model $room): bool
    {
        $fightCard = Card::build($fightCard);
        $card = Card::build($card);

        return (bool) $this->centrifugo->publish('room', [
            'event' => 'game_beat',
            'status' => $fightCard->isHigherThan($card, $room->deck->get('trump'), '6'),
        ]);
    }

    public function takeFromTable(int $room, int $player): void
    {
        $room = Room::query()->find($room);
        $table = $room->deck->get('table');
        $playerCards = $table;

        $room->deck->get('player')[$player][] = $playerCards;
        unset($room->deck->get('table')[$player]);

        $room->update([
            'deck' => [
                'cards' => $room->deck->get('cards'),
                'players' => $room->deck->get('players'),
                'table' => [],
                'trump' => last($room->deck->get('cards'))['suit'],
            ],
        ]);

        $this->centrifugo->publish('room', [
            'event' => 'player_take_table',
            'deck' => $room->deck,
        ]);
    }

    public function discardCard(Card $card, int $room): void
    {
        $room = Room::query()->find($room);
        $table = $room->deck->get('table');
        $table[] = $card->toString();
        $room->update([
            'deck' => [
                'cards' => $room->deck->get('cards'),
                'table' => $table,
                'players' => $room->deck->get('players'),
                'trump' => last($room->deck->get('cards'))['suit'],
            ],
        ]);
    }

    public function allPlayersReady(int $id): void
    {
        $this->centrifugo->publish('room', [
            'event' => 'all_players_ready',
            'users' => Room::query()->find($id)->ready_state,
        ]);
    }

    public function userJoin(int $room, int $player): void
    {
        $this->centrifugo->publish('room', [
            'event' => 'user_join_room',
            'user' => User::query()->findOrFail($player),
        ]);
    }

    public function userLeft(int $room, int $player): void
    {
        $this->centrifugo->publish('room', [
            'event' => 'user_left_room',
            'player' => $player,
        ]);
    }
}
