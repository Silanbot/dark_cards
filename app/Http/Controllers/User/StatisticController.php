<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $user = User::query()->find($request->id);

        return response()->json([
            'id' => $user->id,
            'coins' => $user->coins,
            'cash' => $user->cash,
            'trophies' => $user->trophies,
            'total_cash' => $user->total_cash,
            'total_coins' => $user->total_coins,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
        ]);
    }
}
