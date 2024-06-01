<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

Route::prefix('game')->group(function () {
    Route::get('/start-game', [GameController::class, 'startGame'])->name('game.start');
    Route::post('/searching', [GameController::class, 'searching'])->name('game.searching');
    Route::get('/set-ready-state/{room}', [GameController::class, 'setReadyState'])->name('game.setReadyState');
    Route::get('/join', [GameController::class, 'join'])->name('game.join');
});
