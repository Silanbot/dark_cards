<?php

use App\Http\Controllers\DeckController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TelegramBotMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('profile', [UserController::class, 'profile'])->name('profile');
Route::post('create-game', [GameController::class, 'createGame'])->name('create-game');
Route::prefix('/auth/')->group(function () {
    Route::get('token', TokenController::class)->name('auth.token');
});
Route::get('/deck', DeckController::class)->name('deck');

Route::middleware(TelegramBotMiddleware::class)->group(function () {
    Route::put('/update-balance', [UserController::class, 'updateBalance'])->name('update-balance');
    Route::get('/stats', StatisticController::class)->name('statistic');
});
