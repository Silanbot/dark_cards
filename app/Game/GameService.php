<?php

declare(strict_types=1);

namespace App\Game;

use App\Contracts\Game\GameContract;
use App\Models\Room;
use Illuminate\Database\Eloquent\Model;
use phpcent\Client;

class GameService implements GameContract
{
    protected Client $centrifugo;

    public function __construct(Client $centrifugo)
    {
        $this->centrifugo = $centrifugo;
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
            'attacker_player_index' => $room->opponent_player_index,
            'opponent_player_index' => $room->attacker_player_index,
        ]);

        return $players[$player];
    }

    public function calculateWinnerAmount(Model $model): array
    {
        $maxGamers = $model->max_gamers;
        $winners = $model->winners;

        if ($maxGamers == 2) {
            $winners[auth()->id()] = $model->bank * 0.92;
        }

        if ($maxGamers == 3 && blank($winners)) {
            $winners[auth()->id()] = $model->bank * 0.6;
        } elseif ($maxGamers == 3 && count($winners) === 1) {
            $winners[auth()->id()] = $model->bank * 0.32;
        }

        if ($maxGamers == 4 && blank($winners)) {
            $winners[auth()->id()] = $model->bank * 0.5;
        } elseif ($maxGamers == 4 && count($winners) === 1) {
            $winners[auth()->id()] = $model->bank * 0.3;
        } elseif ($maxGamers == 4 && count($winners) == 2) {
            $winners[auth()->id()] = $model->bank * 0.12;
        }

        if ($maxGamers == 5 && blank($winners)) {
            $winners[auth()->id()] = $model->bank * 0.45;
        } elseif ($maxGamers == 5 && count($winners) === 1) {
            $winners[auth()->id()] = $model->bank * 0.25;
        } elseif ($maxGamers == 5 && count($winners) === 2) {
            $winners[auth()->id()] = $model->bank * 0.15;
        } elseif ($maxGamers == 5 && count($winners) === 3) {
            $winners[auth()->id()] = $model->bank * 0.07;
        }

        if ($maxGamers == 6 && blank($winners)) {
            $winners[auth()->id()] = $model->bank * 0.35;
        } elseif ($maxGamers == 6 && count($winners) === 1) {
            $winners[auth()->id()] = $model->bank * 0.22;
        } elseif ($maxGamers == 6 && count($winners) === 2) {
            $winners[auth()->id()] = $model->bank * 0.17;
        } elseif ($maxGamers == 6 && count($winners) === 3) {
            $winners[auth()->id()] = $model->bank * 0.12;
        } elseif ($maxGamers == 6 && count($winners) === 4) {
            $winners[auth()->id()] = $model->bank * 0.06;
        }

        $model->update([
            'winners' => $winners,
        ]);

        return $winners;
    }

    public function beat(string $fightCard, string $card, Model $room): bool
    {
        $fightCard = Card::build($fightCard);
        $card = Card::build($card);
        if ($fightCard->isHigherThan($card, $room->deck->get('trump'), '6') && blank($room->deck->get('deck')) && blank($room->deck->get('players')[auth()->id()])) {
            return (bool) $this->centrifugo->publish('room', [
                'event' => 'user_win',
                'user_id' => auth()->id(),
                'winners' => $this->calculateWinnerAmount($room),
            ]);
        }

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
            'attacker_player_index' => $room->opponent_player_index,
            'opponent_player_index' => $room->attacker_player_index,
            'current_player_index' => $room->attacker_player_index
        ]);

        $this->centrifugo->publish('room', [
            'event' => 'discard_card',
            'deck' => $room->deck,
            'attacker_player_index' => $room->attacker_player_index,
            'opponent_player_index' => $room->opponent_player_index,
        ]);
    }

    public function userLeft(int $room, int $player): void
    {
        $room = Room::query()->find($room);
        $joinState = $room->join_state->toArray();
        $id = array_search($player, $joinState);
        unset($joinState[$id]);
        $room->update([
            'join_state' => $joinState
        ]);
        $this->centrifugo->publish('room', [
            'event' => 'user_left_room',
            'player' => $player,
        ]);
    }

    public function revertCard(string $card, int $room, int $player): void
    {
        $room = Room::query()->find($room);
        $table = collect($room->deck->get('table'));

        if ($table->contains($card)) {
            $this->centrifugo->publish('room', [
                'event' => 'revert_card',
                'card' => $card,
                'player' => $player,
                'table' => $table,
            ]);
        }
    }

    /**
     * Бито
     */
    public function beats(int $room): void
    {
        $room = Room::query()->find($room);
        $room->update([
            'deck' => [
                'cards' => $room->deck->get('cards'),
                'players' => $room->deck->get('players'),
                'table' => [],
                'trump' => last($room->deck->get('cards'))['suit'],
            ],
        ]);

        $this->centrifugo->publish('room', [
            'event' => 'beats',
            'deck' => $room->deck,
        ]);
    }
}
