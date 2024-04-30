<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class PlayController extends Controller
{
    public function __invoke(Request $request, Room $room): Response|ResponseFactory
    {
        return inertia('PlayView', [
            'room_id' => $room->id,
        ]);
    }
}
