<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Testing\Fluent\AssertableJson;

test('user send successfully friend request', function () {
    Artisan::call('migrate --seed');

    $response = $this->post(route('friends.send'), [
        'user_id' => 1,
        'recipient_id' => 2,
    ]);

    $response->assertOk();
    $response->assertJson(fn (AssertableJson $json) => $json->hasAny(['success']));
});
