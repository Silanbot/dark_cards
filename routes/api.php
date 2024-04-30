<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('profile', [UserController::class, 'profile'])->name('profile');
Route::post('create-game', [GameController::class, 'createGame'])->name('create-game');
Route::prefix('/auth/')->group(function () {
    Route::get('token', TokenController::class)->name('auth.token');
});
