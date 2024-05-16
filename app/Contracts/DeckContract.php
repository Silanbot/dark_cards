<?php

namespace App\Contracts;

interface DeckContract
{
    public function distribute(int $players): void;
}
