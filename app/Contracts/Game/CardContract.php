<?php

namespace App\Contracts\Game;

use App\Game\Card;

interface CardContract
{
    /**
     * Проверяет может ли карта побить другую карту
     */
    public function isHigherThan(Card $card, string $trumpSuit, string $foolRank): bool;
}
