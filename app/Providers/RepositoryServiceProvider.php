<?php

namespace App\Providers;

use App\Repositories\Contracts\MessageRepository;
use App\Repositories\Contracts\MessageRepositoryContract;
use App\Repositories\Contracts\UserRepositoryContract;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserRepositoryContract::class, UserRepository::class);
        $this->app->bind(MessageRepositoryContract::class, MessageRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
