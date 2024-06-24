<?php

namespace App\Http\Controllers\Game;

use App\Game\Deck;
use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use phpcent\Client;

class DeckController extends Controller
{
    public function __invoke(Request $request, Room $room, Client $client): void
    {
        $deck = new Deck();
        $deck->shuffle();

        $room->update(['deck' => $deck]);

        $client->publish('game', [
            'deck' => 1,
        ]);
    }
}
