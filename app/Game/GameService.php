<?php

declare(strict_types=1);

namespace App\Game;

use App\Contracts\GameContract;
use phpcent\Client;

class GameService implements GameContract
{
    protected Client $centrifugo;

    public function __construct(Client $centrifugo)
    {
        $this->centrifugo = $centrifugo;
    }

    public function distribute(int $id): void
    {
        $this->centrifugo->publish("room:{$id}", [

        ]);
    }

    public function takeFromDeck(): array
    {
        // TODO: Implement takeFromDeck() method.
    }

    public function beat(Card $fightCard, Card $card): bool
    {
        // TODO: Implement beat() method.
    }

    public function takeFromTable(): array
    {
        // TODO: Implement takeFromTable() method.
    }
}
