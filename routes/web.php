<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlayController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', ProfileController::class)->name('profile');
Route::get('/home', HomeController::class)->name('home');
Route::get('/play/{room}', PlayController::class)->name('play');
