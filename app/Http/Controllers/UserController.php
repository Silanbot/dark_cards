<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\UserRepositoryContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class UserController extends Controller
{
    public function __construct(
        private readonly UserRepositoryContract $actor
    ) {
    }

    public function profile(Request $request): Model|Builder
    {
        return $this->actor->findOrCreateUser($request->id, $request->username);
    }

    public function updateBalance(Request $request): JsonResponse
    {
        $user = $this->actor->findByID($request->id);

        $user->update(['balance' => $request->balance]);

        return response()->json([
            'balance' => $user->balance,
        ], 204);
    }
}
