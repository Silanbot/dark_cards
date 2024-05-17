<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryContract;
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
        return User::query()->firstOrCreate(['id' => $id], ['id' => $id, 'username' => $username]);
    }
}
