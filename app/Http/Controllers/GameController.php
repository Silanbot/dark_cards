<?php

namespace App\Http\Controllers;

use App\Contracts\Game\GameContract;
use App\Models\Room;
use Illuminate\Http\Request;
use phpcent\Client;

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
        $this->contract->distribute((int)$request->room_id, $request->players);
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

    public function join(Request $request)
    {
        $this->contract->userJoin($request->id, 1);
    }

    public function setReadyState(Request $request, Room $room): void
    {
        $state = $room->ready_state;
        $state[] = $request->user_id;

        if ($room->max_gamers === count($state)) {
            $this->contract->allPlayersReady($room->id);
        }
//        if (in_array($request->user_id, $state->toArray())) {
//            unset($state[array_search($request->user_id, $state->toArray())]);
//        } else {
//            if ($room->max_gamers === count($state)) {
//                $this->contract->allPlayersReady($room->id);
//            }
//
//            $state[] = $request->user_id;
//        }

        $room->update([
            'ready_state' => $state,
        ]);
    }
}
