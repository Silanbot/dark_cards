<?php

namespace App\Providers;

use App\Contracts\DeckContract;
use App\Game\Deck;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use phpcent\Client;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(Client::class, function (Application $application) {
            $client = new Client($application['config']['centrifugo']['host']);
            $client->setApiKey($application['config']['centrifugo']['api_key']);
            $client->setSecret($application['config']['centrifugo']['token_hmac_secret']);

            return $client;
        });

//        $this->app->bind(DeckContract::class, fn (Application $application) => new Deck());
    }
}
