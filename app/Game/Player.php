<?php

declare(strict_types=1);

namespace App\Game;

final class Player
{
    private const CARDS_LIMIT = 6;

    private string $name;

    /**
     * @var Card[]
     */
    private array $cards;

    private bool $isOutOfTheGame = false;

    private bool $defeated;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    private function getTrumpCardIndexes(): array
    {
        return array_filter($this->cards, fn (Card $card) => $card->isTrump());
    }

    public function getSimpleCardIndexes(): array
    {
        return array_filter($this->cards, fn (Card $card) => ! $card->isTrump());
    }

    public function isOutOfTheGame(): bool
    {
        return $this->isOutOfTheGame;
    }

    public function hasEnoughCards(): bool
    {
        return count($this->cards) >= self::CARDS_LIMIT;
    }

    public function setIsOutOfTheGame(bool $isOutOfTheGame): void
    {
        $this->isOutOfTheGame = $isOutOfTheGame;
    }

    public function isDefeated(): bool
    {
        return $this->defeated;
    }

    public function setIsDefeated(bool $isDefeated): void
    {
        $this->defeated = $isDefeated;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function takeCard(Card $card): void
    {
        $this->cards[] = $card;
    }

    public function sortCards(string $trumpSuitName): void
    {
        $this->cards = CardSorter::sort($trumpSuitName, $this->cards);
    }
}
