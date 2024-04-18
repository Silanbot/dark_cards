<?php

test('home screen returns successfully response', function () {
    $response = $this->get(route('home'));

    $response->assertStatus(200);
});

test('profile screen returns successfully', function () {
    $response = $this->get(route('profile'));

    $response->assertStatus(200);
});

test('play screen returns successfully', function () {
    $response = $this->get(route('play'));

    $response->assertStatus(200);
});
