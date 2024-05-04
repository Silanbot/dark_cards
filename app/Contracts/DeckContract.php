<?php

namespace App\Contracts;

interface DeckContract
{
    public function getCards(): array;

    public function shuffle(): void;
}
