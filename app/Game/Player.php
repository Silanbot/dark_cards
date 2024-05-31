<?php

declare(strict_types=1);

namespace App\Game;

use App\Contracts\Game\PlayerContract;

final class Player implements PlayerContract
{
    public function __construct(public array $hand, public int $id)
    {
    }

    public function beat()
    {

    }

    public function toArray(): array
    {
        return array_map(fn (Card $card) => strtolower($card->rank[0].$card->suit[0]), $this->hand);
    }
}
