<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Friend\FriendController;
use App\Http\Controllers\Game\ConnectController;
use App\Http\Controllers\Game\GameController;
use App\Http\Controllers\Message\MessageController;
use App\Http\Controllers\User\StatisticController;
use App\Http\Controllers\User\TokenController;
use App\Http\Controllers\User\UserController;
use App\Http\Middleware\TelegramBotMiddleware;
use Illuminate\Support\Facades\Route;

Route::post('/authorize', [AuthController::class, 'authorize'])->name('auth.authorize');

Route::middleware(TelegramBotMiddleware::class)->group(function () {
    Route::put('/update-balance', [UserController::class, 'updateBalance'])->name('update-balance');
    Route::get('/stats', StatisticController::class)->name('statistic');
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('/friends/')->group(function () {
        Route::post('/request', [FriendController::class, 'send'])->name('friends.send');
        Route::get('/search', [FriendController::class, 'search'])->name('friends.search');
        Route::post('/accept', [FriendController::class, 'accept'])->name('friends.accept');
        Route::get('/', [FriendController::class, 'index'])->name('friends');
        Route::get('/pending', [FriendController::class, 'pending'])->name('friends.pending');
    });

    Route::get('profile', [UserController::class, 'profile'])->name('api.profile');
    Route::post('create-game', [GameController::class, 'createGame'])->name('create-game');
    Route::prefix('/auth/')->group(function () {
        Route::get('token', TokenController::class)->name('auth.token');
    });

    Route::prefix('/messages')->group(function () {
        Route::get('/', [MessageController::class, 'index'])->name('messages');
        Route::post('/send', [MessageController::class, 'send'])->name('messages.send');
    });

    Route::get('/join-by-password', ConnectController::class);
});

require 'game.php';
