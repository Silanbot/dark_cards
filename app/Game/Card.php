<?php

declare(strict_types=1);

namespace App\Game;

final readonly class Card
{
    public function __construct(public string $suit, public string $rank)
    {
    }

    public function isHigherThan(Card $card, string $trumpSuit, string $foolRank): bool
    {
        if ($this->suit === $trumpSuit && $card->suit !== $trumpSuit) {
            return true;
        }
        if ($this->suit !== $trumpSuit && $card->suit === $trumpSuit) {
            return false;
        }
        if ($this->rank === $foolRank && $card->rank !== $foolRank) {
            return true;
        }
        if ($this->rank !== $foolRank && $card->rank === $foolRank) {
            return false;
        }
        if ($this->suit === $card->suit) {
            $ranks = ['6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];

            return array_search($this->rank, $ranks) > array_search($card->rank, $ranks);
        }

        return false;
    }
}
