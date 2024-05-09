<?php

declare(strict_types=1);

namespace App\Game;

final class Card extends BasicEnum
{
    public function __construct(
        private Suit $suit,
        private Rank $rank
    ) {
    }

    public function getCardRating(): int
    {
        return $this->getRank()->getRankRating($this->getSuit()->isTrump());
    }

    public function setAsTrump(): void
    {
        $this->getSuit()->setIsTrump(true);
    }

    public function getSuitName(): string
    {
        return $this->getSuit()->getName();
    }

    public function isTrump(): bool
    {
        return $this->getSuit()->isTrump();
    }

    public function setRank(Rank $rank): void
    {
        $this->rank = $rank;
    }

    public function setSuit(Suit $suit): void
    {
        $this->suit = $suit;
    }

    public function getRank(): Rank
    {
        return $this->rank;
    }

    public function getSuit(): Suit
    {
        return $this->suit;
    }
}
