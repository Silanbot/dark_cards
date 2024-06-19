<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Testing\Fluent\AssertableJson;

test('authentication success', function () {
    Artisan::call('migrate');

    $response = $this->post(route('auth.authorize'), [
        'web_app_data' => [
            'id' => 1,
            'username' => 'KaptainMidnight',
        ],
    ]);

    $response->assertJson(fn (AssertableJson $json) => $json->hasAll(['token', 'token_type']));
});
