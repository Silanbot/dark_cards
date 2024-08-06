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
        $service = new ProfilePhotoAction();
        $user = $this->actor->findOrCreateUser($request->id, $request->username)->toArray();
        $user['avatar'] =  $service->extract($request->id);

        return $user;
    }

    public function updateBalance(Request $request): JsonResponse
    {
        $user = $this->actor->findByID($request->id);

        $user->update(['balance' => $request->balance]);

        return response()->json([
            'balance' => $user->balance,
        ]);
    }
}
