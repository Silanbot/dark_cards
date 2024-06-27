<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlayController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia('App');
});
Route::get('/profile', ProfileController::class)->name('profile');
Route::get('/achievements', fn () => inertia('AchievementsView'));
Route::get('/home', HomeController::class)->name('home');
Route::get('/play/{room}', [PlayController::class, 'connect'])->name('play');
Route::get('/filter1', function () {
    return inertia('Filter1View');
});
Route::get('/filter3', function () {
    return inertia('Filter3View');
});
