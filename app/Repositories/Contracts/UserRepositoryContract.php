<?php

namespace App\Repositories\Contracts;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface UserRepositoryContract
{
    public function findByUsername(string $username): Builder|Model|User;

    public function findByID(int $id): Builder|Model|User;

    public function findOrCreateUser(int $id, string $username): Model|User;
}
