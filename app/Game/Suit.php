<?php

declare(strict_types=1);

namespace App\Game;

use App\Exceptions\RankException;

final class Suit extends BasicEnum
{
    const SPADE = '♠';
    const HEART = '♥';
    const CLUB = '♣';
    const DIAMOND = '♦';

    private bool $isTrump = false;

    private string $name;

    public function __construct(string $name, bool $isTrump = false)
    {
        if ($this->isExists($name)) {
            $this->name = $name;
        }

        $this->isTrump = $isTrump;
    }

    private function isExists(string $name): bool
    {
        if (!array_key_exists($name, $this->suits())) {
            throw new RankException("{$name} suit not exists");
        }

        return true;
    }

    public function suits(): array
    {
        return array_flip($this->getConstants());
    }

    public function isTrump(): bool
    {
        return $this->isTrump;
    }

    public function setIsTrump(bool $isTrump): void
    {
        $this->isTrump = $isTrump;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
