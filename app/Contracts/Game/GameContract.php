<?php

namespace App\Contracts\Game;

use App\Game\Card;

interface GameContract
{
    /**
     * Раздать карты игрокам
     *
     * @param  int  $id  ID комнаты
     */
    public function distribute(int $id, array $players): void;

    /**
     * Взять карту из колоды
     *
     * @param  int  $id  ID комнаты
     * @param  int  $player  ID игрока
     */
    public function takeFromDeck(int $id, int $player): array;

    /**
     * Побить карту игрока
     *
     * @return bool Можно ли побить карту
     */
    public function beat(Card $fightCard, Card $card): bool;

    /**
     * Взять карты со стола
     */
    public function takeFromTable(int $room, int $player): void;

    /**
     * Выбросить карту на стол
     */
    public function discardCard(Card $card, int $room): void;
}
