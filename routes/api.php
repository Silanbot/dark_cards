<?php

use App\Http\Controllers\ConnectController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TelegramBotMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('profile', [UserController::class, 'profile'])->name('api.profile');
Route::post('create-game', [GameController::class, 'createGame'])->name('create-game');
Route::prefix('/auth/')->group(function () {
    Route::get('token', TokenController::class)->name('auth.token');
});

Route::middleware(TelegramBotMiddleware::class)->group(function () {
    Route::put('/update-balance', [UserController::class, 'updateBalance'])->name('update-balance');
    Route::get('/stats', StatisticController::class)->name('statistic');
});

Route::prefix('/messages')->group(function () {
    Route::get('/', [MessageController::class, 'index'])->name('messages');
    Route::get('/send', [MessageController::class, 'send'])->name('messages.send');
});

Route::get('/join-by-password', ConnectController::class);

require 'game.php';
