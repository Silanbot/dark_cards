<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\AuthorizeService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function authorize(Request $request, AuthorizeService $service): array
    {
        return [
            'token' => $service->authenticate(json_decode($request->web_app_data, true)),
            'token_type' => 'Bearer',
        ];
    }
}
