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

    public function createGame(Request $request): array
    {
        $room = Room::query()->create($request->only(['bank', 'game_type', 'user_id']));

        return [
            'room_id' => $room->id,
        ];
    }

    public function startGame(Request $request): void
    {
        $this->contract->distribute((int)$request->room_id);
    }

    public function searching(Request $request): array
    {
        $room = Room::query()->whereBetween('bank', $request->bank)
            ->where('game_type', $request->type)
            ->where('max_gamers', $request->max_gamers)
            ->first();

        return [
            'room_id' => $room->id,
        ];
    }

    public function join(Request $request): void
    {
        $this->contract->userJoin($request->id, $request->user_id);
    }

    public function setReadyState(Request $request, Room $room): void
    {
        $state = $room->ready_state;
        if (in_array($request->user_id, $state->toArray())) {
            unset($state[array_search($request->user_id, $state->toArray())]);
        } else {
            $state[] = $request->user_id;

            if ($room->max_gamers === count($state)) {
                $this->contract->allPlayersReady($room->id);
            }
        }

        $room->update([
            'ready_state' => $state,
        ]);
    }
}
