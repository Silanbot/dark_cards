<?php

namespace App\Contracts\Game;

use App\Game\Card;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface GameContract
{
    /**
     * Взять карту из колоды
     *
     * @param  int  $id  ID комнаты
     * @param  int  $player  ID игрока
     * @param int $count Количество карт которые надо взять из колоды
     */
    public function takeFromDeck(int $id, int $player, int $count): array;

    /**
     * Побить карту игрока
     *
     * @return bool Можно ли побить карту
     */
    public function beat(string $fightCard, string $card, int $room): bool;

    /**
     * Взять карты со стола
     */
    public function takeFromTable(int $room, int $player): void;

    /**
     * Выбросить карту на стол
     */
    public function discardCard(Card $card, int $room): void;

    public function userLeft(int $room, int $player): void;

    public function revertCard(string $card, int $room, int $player): void;

    /**
     * Бито
     */
    public function beats(int $room, int $player): mixed;
}
