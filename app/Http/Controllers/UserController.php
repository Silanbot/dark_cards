<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(Request $request): Model|Builder
    {
        return User::query()->firstOrCreate(['id' => $request->get('id')], [
            'id' => $request->get('id'),
            'username' => $request->get('username'),
        ]);
    }

    public function balance(Request $request): JsonResponse
    {
        return response()->json([
            'balance' => User::query()->findOrFail($request->id)->balance,
        ]);
    }

    public function updateBalance(Request $request): JsonResponse
    {
        $user = User::query()->where('id', $request->id)->first();

        $user->update(['balance' => $request->balance]);
        return response()->json([
            'balance' => $user->balance,
        ]);
    }
}
