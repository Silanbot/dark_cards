<?php

namespace App\Contracts;

interface CardContract
{
    public function isHigherThan(CardContract $card, string $trumpSuit): bool;

    public function getSuit(): string;

    public function getRank(): string;

    public function isDefeated(): bool;
}
