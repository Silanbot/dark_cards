<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryContract;
use App\Services\ProfilePhotoAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

final readonly class UserRepository implements UserRepositoryContract
{
    public function findByUsername(string $username): Builder|Model|User
    {
        return User::query()->where('username', $username)->first();
    }

    public function findByID(int $id): Builder|Model|User
    {
        return User::query()->findOrFail($id);
    }

    public function findOrCreateUser(int $id, string $username): Model|User
    {
        $action = new ProfilePhotoAction();

        return User::query()->firstOrCreate(['id' => $id], [
            'id' => $id,
            'username' => $username,
            'coins' => 1000,
            'cash' => 0,
            'trophies' => 0,
            'total_coins' => 0,
            'total_cash' => 0,
            'avatar' => $action->extract($id)
        ])->load(['achievements']);
    }
}
