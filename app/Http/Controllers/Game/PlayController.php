<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class PlayController extends Controller
{
    public function connect(Request $request, Room $room): Response|ResponseFactory
    {
        $settings = array_filter($room->settings->toArray(), fn(array $setting) => !str_starts_with($setting['name'], 'cards_')
            && !str_starts_with($setting['name'], 'max_gamers_')
            && !str_starts_with($setting['name'], 'select_mode_')
        );
        $currency = array_filter($room->settings->toArray(), fn (array $setting) => str_starts_with($setting['name'], 'select_mode_'));
        return inertia('PlayView', [
            'room' => $room,
            'modes' => $settings,
            'currency' => end($currency)['name'] === 'select_mode_2', // true - cash, false - coin
            'players' => !empty($room->ready_state) ? User::query()->whereIn('id', $room->ready_state)->get() : [],
        ]);
    }
}
