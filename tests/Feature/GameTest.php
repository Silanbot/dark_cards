<?php

use App\Game\GameService;
use App\Models\Room;
use Illuminate\Support\Facades\Artisan;
use phpcent\Client;

test('cards have been successfully dealt to the players', function () {
    Artisan::call('migrate');
    $client = new Client(config('centrifugo.host'));
    $client->setApiKey(config('centrifugo.api_key'));
    $client->setSecret(config('centrifugo.token_hmac_secret'));

    $service = new GameService($client);
    $room = Room::query()->create(['id' => 1, 'user_id' => 1, 'bank' => 1000, 'game_type' => 1]);
    $service->distribute(id: $room->id, players: [1, 2, 3]);
    $room = Room::query()->find(1);

    $this->assertNotEmpty($room->deck);
});

test('player was able to take a card from the deck', function () {
    Artisan::call('migrate');
    $client = new Client(config('centrifugo.host'));
    $client->setApiKey(config('centrifugo.api_key'));
    $client->setSecret(config('centrifugo.token_hmac_secret'));

    $service = new GameService($client);
    $room = Room::query()->create(['id' => 1, 'user_id' => 1, 'bank' => 1000, 'game_type' => 1]);
    $service->distribute(id: $room->id, players: [1, 2, 3]);

    $service->takeFromDeck($room->id, 1);
    $room = Room::query()->find(1);

    $this->assertCount(7, $room->deck->get('players')[1]);
});
