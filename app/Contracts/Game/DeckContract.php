<?php

namespace App\Contracts\Game;

interface DeckContract
{
    public function distribute(array $players): void;
}
