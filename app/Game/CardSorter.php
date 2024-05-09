<?php

declare(strict_types=1);

namespace App\Game;

final class CardSorter
{
    /**
     * @param string $trumpSuitName
     * @param Card[] $cards
     * @return array
     */
    public static function sort(string $trumpSuitName, array $cards): array
    {
        $result = [];
        $suitNames = [Suit::SPADE, Suit::CLUB, Suit::DIAMOND, Suit::HEART];
        $cardsSplitBySuit = [];

        foreach ($cards as $card) {
            $cardsSplitBySuit[$card->getSuitName()][$card->getCardRating()] = $card;
        }

        $cardsSplitBySuitSortedBySuitName = [];
        foreach ($suitNames as $index => $suitName) {
            if (array_key_exists($suitName, $cardsSplitBySuit)) {
                $cardsSplitBySuitSortedBySuitName[$suitName] = $cardsSplitBySuit[$suitName];
            }
        }

        foreach ($cardsSplitBySuitSortedBySuitName as $suitName => $cardsBySuit) {
            if (!is_array($cardsBySuit)) {
                unset($cardsSplitBySuitSortedBySuitName[$suitName]);
                continue;
            }

            ksort($cardsSplitBySuitSortedBySuitName[$suitName]);
        }

        $trumpCards = [];
        foreach ($cardsSplitBySuitSortedBySuitName as $suitName => $suitCards) {
            if ($trumpSuitName === $suitName) {
                $trumpCards = $suitCards;
                continue;
            }

            $result = array_merge($result, $suitCards);
        }

        return array_merge($result, $trumpCards);
    }
}
