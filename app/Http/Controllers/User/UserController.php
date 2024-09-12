<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepositoryContract;
use App\Services\ProfilePhotoAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class UserController extends Controller
{
    public function __construct(
        private readonly UserRepositoryContract $actor
    ) {}

    public function profile(Request $request): Model|Builder|array
    {
        $service = new ProfilePhotoAction;
        $user = $this->actor->findOrCreateUser($request->id, $request->username)->toArray();
        if (config('app.env') === 'production') {
            $user['avatar'] = $service->extract($request->id);
        }

        return $user;
    }

    public function updateBalance(Request $request): JsonResponse
    {
        $user = $this->actor->findByID($request->id);

        if ($request->has('cash')) {
            $user->update(['cash' => $request->cash]);
        }
        if ($request->has('coins')) {
            $user->update(['coins' => $request->coins]);
        }

        return response()->json([
            'coins' => $user->coins,
            'cash' => $user->cash,
        ]);
    }
}
