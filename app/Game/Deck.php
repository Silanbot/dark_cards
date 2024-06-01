<?php

declare(strict_types=1);

namespace App\Game;

use App\Contracts\Game\DeckContract;

final class Deck implements DeckContract
{
    const MAX_CARDS = 6;

    /**
     * @var Card[]
     */
    private array $cards = [];

    /**
     * @var Player[]
     */
    private array $players = [];

    public function __construct(array $players)
    {
        $suits = ['Hearts', 'Diamonds', 'Clubs', 'Spades'];
        $ranks = ['6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];

        foreach ($suits as $suit) {
            foreach ($ranks as $rank) {
                $this->cards[] = new Card(suit: $suit, rank: $rank);
            }

            shuffle($this->cards);
        }

        $this->distribute($players);
    }

    public function distribute(array $players): void
    {
        for ($i = 0; $i < count($players); $i++) {
            $cards = array_splice($this->cards, offset: self::MAX_CARDS * $i, length: self::MAX_CARDS);
            $this->players[$players[$i]] = (new Player(hand: $cards, id: (int)$players[$i]))->toArray();
        }
    }

    public function getPlayers(): array
    {
        return $this->players;
    }

    public function getCards(): array
    {
        return $this->cards;
    }

    public function getTrumpCard(): Card
    {
        return last($this->cards);
    }
}
