<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

Route::prefix('game')->group(function () {
    Route::post('/start-game', [GameController::class, 'startGame'])->name('game.start');
    Route::post('/searching', [GameController::class, 'searching'])->name('game.searching');
});
