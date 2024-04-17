<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia('HomeView');
});

Route::get('/profile', function () {
    return inertia('ProfileView');
});
