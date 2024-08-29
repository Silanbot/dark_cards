<?php

use App\Http\Controllers\Game\GameController;
use Illuminate\Support\Facades\Route;

Route::prefix('game')->group(function () {
    Route::post('/searching', [GameController::class, 'searching'])->name('game.searching');
    Route::get('/set-ready-state/{room}', [GameController::class, 'setReadyState'])->name('game.setReadyState');
    Route::get('/join', [GameController::class, 'join'])->name('game.join');
    Route::get('/leave', [GameController::class, 'leave'])->name('game.leave');
    Route::get('/take-from-deck', [GameController::class, 'takeFromDeck'])->name('game.takeFromDeck');
    Route::get('/take-from-table', [GameController::class, 'takeFromTable'])->name('game.takeFromTable');
    Route::get('/fight', [GameController::class, 'fight'])->name('game.fight');
    Route::get('/discard-card', [GameController::class, 'discardCard'])->name('game.discardCard');
    Route::get('/beats', [GameController::class, 'beats'])->name('game.beats');
    Route::get('/revert-card', [GameController::class, 'revertCard'])->name('game.beats');
});
