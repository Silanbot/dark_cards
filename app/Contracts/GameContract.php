<?php

namespace App\Contracts;

use App\Game\Card;

interface GameContract
{
    /**
     * Раздать карты игрокам
     *
     * @param  int  $id  ID комнаты
     */
    public function distribute(int $id): void;

    /**
     * Взять карту из колоды
     */
    public function takeFromDeck(): array;

    /**
     * Побить карту игрока
     *
     * @return bool Можно ли побить карту
     */
    public function beat(Card $fightCard, Card $card): bool;

    /**
     * Взять карты со стола
     */
    public function takeFromTable(): array;
}
