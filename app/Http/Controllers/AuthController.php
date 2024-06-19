<?php

namespace App\Http\Controllers;

use App\Services\AuthorizeService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function authorize(Request $request, AuthorizeService $service): array
    {
        return [
            'token' => $service->authenticate($request->web_app_data),
            'token_type' => 'Bearer',
        ];
    }
}
