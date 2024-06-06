<?php

declare(strict_types=1);

namespace App\Game;

use App\Contracts\Game\CardContract;

final readonly class Card implements CardContract
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

    public function getSuit(): string
    {
        return $this->suit;
    }

    public function getRank(): string
    {
        return $this->rank;
    }

    public function toString(): string
    {
        if ($this->rank === '10') {
            return strtolower($this->rank[0].$this->suit[0]);
        }

        return strtolower($this->rank.$this->suit[0]);
    }

    public static function build(string $card): self
    {
        $suit = '';
        $rank = null;

        if ($card[0] === '1') {
            $rank = '10';
        }
        switch ($card[1]) {
            case 's':
                $suit = 'Spades';
                break;
            case 'd':
                $suit = 'Diamonds';
                break;
            case 'h':
                $suit = 'Hearts';
                break;
            case 'c':
                $suit = 'Clubs';
                break;
        }

        return new self($suit, $rank);
    }
}
