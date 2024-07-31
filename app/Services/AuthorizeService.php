<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryContract;

readonly class AuthorizeService
{
    public function __construct(private UserRepositoryContract $contract) {}

    public function authenticate(array $data): string
    {
        $id = $data['id'];
        $username = $data['username'];
        $user = $this->contract->findOrCreateUser($id, $username);

        return $user->createToken('telegram')?->plainTextToken;
    }
}
