<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function createGame(Request $request)
    {
        $room = Room::query()->create($request->only(['bank', 'game_type', 'user_id']));

        return [
            'room_id' => $room->id,
        ];
    }
}
