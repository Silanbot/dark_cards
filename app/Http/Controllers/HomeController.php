<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class HomeController extends Controller
{
    public function __invoke(Request $request): Response|ResponseFactory
    {
        return inertia('HomeView');
    }
}
