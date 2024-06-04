<?php

namespace App\Http\Controllers;

use App\Game\Deck;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;
use phpcent\Client;

class PlayController extends Controller
{
    public function connect(Request $request, Room $room): Response|ResponseFactory
    {
        return inertia('PlayView', [
            'room' => $room,
            'players' => !empty($room->ready_state) ? User::query()->whereIn('id', $room->ready_state)->get() : [],
        ]);
    }

    public function distribute(Request $request, Client $centrifuge): void
    {
        $players = $request->players;
        $deck = new Deck(players: $players);

        $centrifuge->publish('room', $deck->getPlayers());
    }
}
