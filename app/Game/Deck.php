<?php

declare(strict_types=1);

namespace App\Game;

use App\Contracts\DeckContract;

final class Deck implements DeckContract
{
    /**
     * @var Card[]
     */
    private array $cards;

    public function __construct()
    {
        $suits = ['Hearts', 'Diamonds', 'Clubs', 'Spades'];
        $ranks = ['6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];

        $this->cards = [];
        foreach ($suits as $suit) {
            foreach ($ranks as $rank) {
                $this->cards[] = new Card(suit: $suit, rank: $rank, defeated: false);
            }
        }
    }

    public function getCards(): array
    {
        return $this->cards;
    }

    public function shuffle(): void
    {
        shuffle($this->cards);
    }
}
