<?php

use App\Models\Room;

test('home screen returns successfully response', function () {
    $response = $this->get(route('home'));

    $response->assertStatus(200);
});

test('profile screen returns successfully', function () {
    $response = $this->get(route('profile'));

    $response->assertStatus(200);
});

test('play screen returns successfully', function () {
    $room = Room::query()->create([
        'user_id' => 1,
        'bank' => 100,
        'game_type' => 1,
        'max_gamers' => 2,
        'deck' => json_encode([]),
    ]);
    $response = $this->get(route('play', ['room' => $room->id]));

    $response->assertStatus(200);
});
