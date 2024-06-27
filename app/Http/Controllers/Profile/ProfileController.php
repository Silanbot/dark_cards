<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class ProfileController extends Controller
{
    public function __invoke(Request $request): Response|ResponseFactory
    {
        return inertia('ProfileView');
    }
}
