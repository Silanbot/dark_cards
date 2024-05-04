<?php

declare(strict_types=1);

namespace App\Game;

use App\Contracts\CardContract;

final readonly class Card implements CardContract
{
    public function __construct(
        public string $suit,
        public string $rank,
        public bool $defeated
    ) {
    }

    public function isHigherThan(CardContract $card, string $trumpSuit): bool
    {
        if ($this->suit === $trumpSuit && $card->suit !== $trumpSuit) {
            return true;
        }
        if ($this->suit !== $trumpSuit && $card->suit === $trumpSuit) {
            return false;
        }
        if ($this->suit === $card->suit) {
            $ranks = ['6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];

            return array_search($this->rank, $ranks) > array_search($card->rank, $ranks);
        }

        return false;
    }

    public function isDefeated(): bool
    {
        return $this->defeated;
    }

    public function getSuit(): string
    {
        return $this->suit;
    }

    public function getRank(): string
    {
        return $this->rank;
    }
}
