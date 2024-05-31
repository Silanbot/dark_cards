<?php

namespace App\Services;

use App\Contracts\Services\GameServiceContract;
use App\Enums\GameTypeEnum;
use App\Game\Deck;
use App\Models\Room;
use Illuminate\Database\Eloquent\Model;

class GameService implements GameServiceContract
{
    public function start(int $bank, GameTypeEnum $type, int $maxGamers, array $players): Model|Room
    {
        $deck = (new Deck($players));

        return Room::query()->create([
            'bank' => $bank,
            'game_type' => $type->value,
            'max_gamers' => $maxGamers,
            'deck' => $deck->getPlayers(),
        ]);
    }

    public function selectionOpponents(array $bank, GameTypeEnum $type, int $maxGamers): int
    {
        $room = Room::query()->whereBetween('bank', $bank)
            ->where('game_type', $type->value)
            ->where('max_gamers', $maxGamers)
            ->first();

        return $room->id;
    }
}
