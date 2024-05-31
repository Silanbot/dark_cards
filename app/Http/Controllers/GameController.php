<?php

namespace App\Http\Controllers;

use App\Contracts\Game\GameContract;
use App\Models\Room;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function __construct(private readonly GameContract $contract)
    {
    }

    public function createGame(Request $request)
    {
        $room = Room::query()->create($request->only(['bank', 'game_type', 'user_id']));

        return [
            'room_id' => $room->id,
        ];
    }

    public function startGame(Request $request): void
    {
        $this->contract->distribute($request->room_id, $request->players);
    }

    public function searching(Request $request)
    {
        $room = Room::query()->whereBetween('bank', $request->bank)
            ->where('game_type', $request->type)
            ->where('max_gamers', $request->max_gamers)
            ->first();

        return [
            'room_id' => $room->id,
        ];
    }
}
