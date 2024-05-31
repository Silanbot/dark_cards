<?php

namespace App\Contracts\Services;

use App\Enums\GameTypeEnum;
use App\Models\Room;
use Illuminate\Database\Eloquent\Model;

interface GameServiceContract
{
    /**
     * Начинаем игру, генерируем колоду
     */
    public function start(int $bank, GameTypeEnum $type, int $maxGamers, array $players): Model|Room;

    public function selectionOpponents(array $bank, GameTypeEnum $type, int $maxGamers): int;
}
