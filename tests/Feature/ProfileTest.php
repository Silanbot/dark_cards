<?php

use Illuminate\Testing\Fluent\AssertableJson;

test('profile created', function () {
    $response = $this->get(route('profile', [
        'id' => rand(1, 100000),
        'username' => fake()->userName(),
    ]));


    $response->assertStatus(200);
});
