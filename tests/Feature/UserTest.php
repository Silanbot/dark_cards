<?php

use App\Http\Middleware\TelegramBotMiddleware;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Testing\Fluent\AssertableJson;
use Symfony\Component\HttpFoundation\Response;

test('user created successfully', function () {
    Artisan::call('migrate');

    $id = fake()->randomNumber();
    $username = fake()->userName();

    $response = $this->get(route('api.profile', [
        'id' => $id,
        'username' => $username,
    ]));

    $response->assertCreated();
    $this->assertDatabaseCount('users', 1);
});

test('profile request to api returns user without saving in database', function () {
    Artisan::call('migrate');
    $user = User::factory()->create();

    $response = $this->get(route('api.profile', [
        'id' => $user->id,
        'username' => $user->username,
    ]));

    $this->assertDatabaseCount('users', 1);
    $response->assertStatus(200);
    $response->assertJson(fn (AssertableJson $json) => $json->hasAll(['id', 'username', 'cash', 'coins', 'remember_token', 'achievements', 'created_at', 'updated_at']));
});

test('impossible update user balance without system token', function () {
    Artisan::call('migrate');
    $request = Request::create(route('update-balance'));
    $next = fn () => response('Secret place');
    $middleware = new TelegramBotMiddleware;
    $response = $middleware->handle($request, $next);

    $this->assertEquals(Response::HTTP_FORBIDDEN, $response->getStatusCode());
});

test('user balance successfully updated with system token', function () {
    Artisan::call('migrate');
    $request = Request::create(route('update-balance'));
    $request->headers->set('X-Api-Auth-Bot', config('services.bot.api_key'));
    $next = fn () => response('Secret place');
    $middleware = new TelegramBotMiddleware;
    $response = $middleware->handle($request, $next);
    $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
    $this->assertEquals('Secret place', $response->getContent());
});
