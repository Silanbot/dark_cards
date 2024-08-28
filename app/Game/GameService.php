<?php

declare(strict_types=1);

namespace App\Game;

use App\Contracts\Game\GameContract;
use App\Models\Room;
use phpcent\Client;

class GameService implements GameContract
{
    protected Client $centrifugo;

    public function __construct(Client $centrifugo)
    {
        $this->centrifugo = $centrifugo;
    }

    private function formatCard(array $card): string
    {
        return strtolower($card['rank'] === '10' ? '1'.$card['suit'][0] : $card['rank'].$card['suit'][0]);
    }

    public function takeFromDeck(int $id, int $player, int $count): array
    {
        $room = Room::query()->find($id);
        $cards = $room->deck->get('cards');
        if ($count <= 0) {
            $this->centrifugo->publish('room', [
                'cards' => [],
                'event' => 'player_take_card',
                'player' => $player,
            ]);

            return [];
        }
        if (count($cards) < $count) {
            $count = count($cards);
        }
        $playerTakeCards = array_slice($cards, 0, $count, true);

        $playerCards = $room->deck->get('players')[$player];
        foreach ($playerTakeCards as $key => $card) {
            $playerCards[] = $this->formatCard($card);
            unset($cards[$key]);
        }
        $players = $room->deck->get('players');
        $players[$player] = $playerCards;

        $room->update([
            'deck' => collect([
                'cards' => array_values($cards),
                'players' => $players,
                'table' => [],
                'trump' => $room->deck->get('trump'),
            ]),
        ]);
        $this->centrifugo->publish('room', [
            'cards' => array_map(fn ($card) => $this->formatCard($card), $playerTakeCards),
            'event' => 'player_take_card',
            'player' => $player,
            'attacker_player_index' => $room->attacker_player_index,
            'opponent_player_index' => $room->opponent_player_index,
        ]);

        return $players[$player];
    }

    public function calculateWinnerAmount(int $model, int $user): array
    {
        $model = Room::query()->find($model);
        $maxGamers = $model->max_gamers;
        $winners = $model->winners;

        if ($maxGamers == 2) {
            $winners[$user] = $model->bank * 0.92;
        }

        if ($maxGamers == 3 && blank($winners)) {
            $winners[$user] = $model->bank * 0.6;
        } elseif ($maxGamers == 3 && count($winners) === 1) {
            $winners[$user] = $model->bank * 0.32;
        }

        if ($maxGamers == 4 && blank($winners)) {
            $winners[$user] = $model->bank * 0.5;
        } elseif ($maxGamers == 4 && count($winners) === 1) {
            $winners[$user] = $model->bank * 0.3;
        } elseif ($maxGamers == 4 && count($winners) == 2) {
            $winners[$user] = $model->bank * 0.12;
        }

        if ($maxGamers == 5 && blank($winners)) {
            $winners[$user] = $model->bank * 0.45;
        } elseif ($maxGamers == 5 && count($winners) === 1) {
            $winners[$user] = $model->bank * 0.25;
        } elseif ($maxGamers == 5 && count($winners) === 2) {
            $winners[$user] = $model->bank * 0.15;
        } elseif ($maxGamers == 5 && count($winners) === 3) {
            $winners[$user] = $model->bank * 0.07;
        }

        if ($maxGamers == 6 && blank($winners)) {
            $winners[$user] = $model->bank * 0.35;
        } elseif ($maxGamers == 6 && count($winners) === 1) {
            $winners[$user] = $model->bank * 0.22;
        } elseif ($maxGamers == 6 && count($winners) === 2) {
            $winners[$user] = $model->bank * 0.17;
        } elseif ($maxGamers == 6 && count($winners) === 3) {
            $winners[$user] = $model->bank * 0.12;
        } elseif ($maxGamers == 6 && count($winners) === 4) {
            $winners[$user] = $model->bank * 0.06;
        }

        $model->update([
            'winners' => $winners,
        ]);

        return $winners;
    }

    public function beat(string $fightCard, string $card, int $room, int $user): bool
    {
        $room = Room::query()->find($room);
        $fightCard = Card::build($fightCard);
        $card = Card::build($card);
        $trump = $room->deck->get('trump');
        if ($fightCard->isHigherThan($card, $trump, '6') && blank($room->deck->get('deck')) && blank($room->deck->get('players')[$user])) {
            return (bool) $this->centrifugo->publish('room', [
                'event' => 'user_win',
                'user_id' => $user,
                'winners' => $this->calculateWinnerAmount($room->id, $user),
            ]);
        }

        if ($fightCard->isHigherThan($card, $room->deck->get('trump'), '6')) {
            $table = $room->deck->get('table');
            $players = $room->deck->get('players');
            $c = array_search(strtolower($fightCard->toString()), $players[$user]);
            $table[] = $fightCard->toString();
            unset($players[$user][$c]);
            $players[$user] = array_values($players[$user]);

            $room->update([
                'deck' => [
                    'cards' => $room->deck->get('cards'),
                    'players' => $players,
                    'table' => $table,
                    'trump' => $room->deck->get('trump'),
                ],
                'attacker_player_index' => $room->opponent_player_index,
                'opponent_player_index' => $room->attacker_player_index,
            ]);

            return (bool) $this->centrifugo->publish('room', [
                'event' => 'game_beat',
                'status' => true,
                'attacker_player_index' => $room->opponent_player_index,
                'opponent_player_index' => $room->attacker_player_index,
                'player' => $user,
            ]);
        }

        return (bool) $this->centrifugo->publish('room', [
            'event' => 'game_beat',
            'status' => false,
            'attacker_player_index' => $room->opponent_player_index,
            'opponent_player_index' => $room->attacker_player_index,
            'player' => $user
        ]);
    }

    public function takeFromTable(int $room, int $player): void
    {
        $room = Room::query()->find($room);
        $table = $room->deck->get('table');
        $players = $room->deck->get('players');
        $players[$player] = array_merge($players[$player], $table);

        $room->update([
            'deck' => [
                'cards' => $room->deck->get('cards'),
                'players' => $players,
                'table' => [],
                'trump' => $room->deck->get('trump'),
            ],
        ]);

        $this->centrifugo->publish('room', [
            'event' => 'player_take_table',
            'deck' => $room->deck,
        ]);
    }

    public function discardCard(Card $card, int $room, int $player): mixed
    {
        $room = Room::query()->find($room);
        $table = $room->deck->get('table');
        $cards = $room->deck->get('cards');

        if (count($cards) === 24 && count($table) === 10) {
            return $this->centrifugo->publish('room', [
                'event' => 'table_full',
            ]);
        }

        if (count($table) === 12) {
            return $this->centrifugo->publish('room', [
                'event' => 'beats_start',
            ]);
        }

        $table[] = $card->toString();
        $players = $room->deck->get('players');
        $index = array_search(strtolower($card->toString()), $players[$player]);
        unset($players[$player][$index]);
        $players[$player] = array_values($players[$player]);
        $room->update([
            'deck' => [
                'cards' => $room->deck->get('cards'),
                'table' => $table,
                'players' => $players,
                'trump' => $room->deck->get('trump'),
            ],
            'attacker_player_index' => $room->opponent_player_index,
            'opponent_player_index' => $room->attacker_player_index,
        ]);

        return $this->centrifugo->publish('room', [
            'event' => 'discard_card',
            'deck' => $room->deck,
            'attacker_player_index' => $room->attacker_player_index,
            'opponent_player_index' => $room->opponent_player_index,
            'player' => $player
        ]);
    }

    public function userLeft(int $room, int $player): void
    {
        $room = Room::query()->find($room);
        $joinState = $room->join_state->toArray();
        $id = array_search($player, $joinState);
        unset($joinState[$id]);
        $room->update([
            'join_state' => $joinState,
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
    public function beats(int $room, int $player): mixed
    {
        $room = Room::query()->find($room);
        $beats = $room->beats;
        if ($beats->contains($player) && $room->opponent_player_index != $player) {
            return 0;
        }

        $beats->push($player);
        $room->update(['beats' => $beats]);

        if ($beats->count() === $room->max_gamers - 1) {
            $room->update([
                'deck' => [
                    'cards' => $room->deck->get('cards'),
                    'players' => $room->deck->get('players'),
                    'table' => [],
                    'trump' => $room->deck->get('trump'),
                ],
                'beats' => [],
                'attacker_player_index' => $room->opponent_player_index,
                'opponent_player_index' => $room->attacker_player_index,
            ]);

            return $this->centrifugo->publish('room', [
                'event' => 'beats',
                'deck' => $room->deck,
                'attacker_player_index' => $room->attacker_player_index,
                'opponent_player_index' => $room->opponent_player_index,
            ]);
        }

        return $this->centrifugo->publish('room', [
            'event' => 'beats_start',
        ]);
    }
}
