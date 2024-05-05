<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        return response()->json(ActivityLog::query()->where('user_id', $request->id)->get());
    }
}
