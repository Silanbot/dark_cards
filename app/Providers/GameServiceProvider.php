<?php

namespace App\Providers;

use App\Contracts\Game\CardContract;
use App\Contracts\Game\DeckContract;
use App\Contracts\Game\PlayerContract;
use App\Game\Card;
use App\Game\Deck;
use App\Game\Player;
use Illuminate\Support\ServiceProvider;

class GameServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(CardContract::class, Card::class);
        $this->app->bind(DeckContract::class, Deck::class);
        $this->app->bind(PlayerContract::class, Player::class);
    }

    public function boot(): void
    {
        //
    }
}
