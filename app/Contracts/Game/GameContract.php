<?php

namespace App\Contracts\Game;

use App\Game\Card;
use Illuminate\Database\Eloquent\Model;

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
    public function beat(string $fightCard, string $card, Model $room): bool;

    /**
     * Взять карты со стола
     */
    public function takeFromTable(int $room, int $player): void;

    /**
     * Выбросить карту на стол
     */
    public function discardCard(Card $card, int $room): void;

    public function allPlayersReady(int $id): void;

    public function userJoin(int $room, int $player): void;

    public function userLeft(int $room, int $player): void;

    public function revertCard(string $card, int $room, int $player): void;
}
