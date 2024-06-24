<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use phpcent\Client;

class TokenController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Client $centrifuge)
    {
        $token = $centrifuge->generateConnectionToken(
            userId: $request->id,
            exp: time() + 5 * 60,
        );

        return response()->json([
            'token' => $token,
        ]);
    }
}
