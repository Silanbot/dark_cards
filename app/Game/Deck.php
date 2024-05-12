<?php

declare(strict_types=1);

namespace App\Game;

use App\Exceptions\DeckException;

final class Deck
{
    /**
     * @var Card[]
     */
    private array $cards;

    private int $randNumber;

    private Card $trumpCard;

    /**
     * @var Suit[]
     */
    private array $suits;

    public function __construct(int $randNumber)
    {
        $this->randNumber = $randNumber;
        $this->createSuits();
        $this->generateCards();
    }

    private function createSuits(): void
    {
        $this->suits = [
            new Suit(Suit::SPADE),
            new Suit(Suit::HEART),
            new Suit(Suit::CLUB),
            new Suit(Suit::DIAMOND),
        ];
    }

    private function generateCards(): void
    {
        foreach ($this->suits as $suit) {
            $cardBySuit = $this->generateCardsBySuit($suit);
            $this->cards[] = $cardBySuit;
        }
    }

    private function generateCardsBySuit(Suit $suit): array
    {
        $result = [];
        $ranks = Rank::getSortedRankNames();

        foreach ($ranks as $rank) {
            $result[] = new Card($suit, new Rank($rank));
        }

        return $result;
    }

    public function isNotEmpty(): bool
    {
        return ! empty($this->suits);
    }

    public function getDeckCount(): int
    {
        return count($this->cards);
    }

    public function sort(int $cardsCount = 36): void
    {
        for ($i = 0; $i < 1000; $i++) {
            $n = ($this->randNumber + ($i * 2)) % $cardsCount;
            $cardToStart = $this->cards[$n];
            unset($this->cards[$n]);
            $this->cards = array_merge([$cardToStart], $this->cards);
        }
    }

    public function extractCard(): Card
    {
        if ($this->getDeckCount() === 0) {
            throw new DeckException('No cards in deck left');
        }

        return array_shift($this->cards);
    }

    public function createTrump(): void
    {
        $this->trumpCard = array_shift($this->cards);
        $this->trumpCard->setAsTrump();
        $this->cards[] = $this->trumpCard;
    }

    public function getTrumpCard(): Card
    {
        return $this->trumpCard;
    }

    public function getTrumpSuitName(): string
    {
        return $this->trumpCard->getSuitName();
    }
}
