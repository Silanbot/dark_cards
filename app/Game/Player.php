<?php

declare(strict_types=1);

namespace App\Game;

final class Player
{
    public function __construct(public array $hand)
    {
    }

    public function takeCard(Card $card): void
    {
        $this->hand[] = $card;
    }

    public function playCard(): ?Card
    {
        return array_pop($this->hand);
    }

    public function toArray(): array
    {
        return array_map(fn ($item) => strtolower($item->rank[0].$item->suit[0]), $this->hand);
    }
}
