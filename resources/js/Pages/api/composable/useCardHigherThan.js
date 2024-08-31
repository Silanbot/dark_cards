function getSuits() {
    return {
        s: 'Spades',
        d: 'Diamonds',
        h: 'Hearts',
        c: 'Clubs'
    }
}

function getRanks() {
    return ['6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A']
}

function buildCard(card) {
    const rank = card[0]
    const suit = getSuits()[card[1]]

    return {
        suit,
        rank,
    }
}

export default function useCardHigherThan(fightCard, card, trump) {
    const fightCardFormatted = buildCard(fightCard)
    const cardFormatted = buildCard(card)

    if (fightCardFormatted.suit === trump && cardFormatted.suit !== trump) {
        return true
    }

    if (fightCardFormatted.suit !== trump && cardFormatted.suit === trump) {
        return false
    }

    if (fightCardFormatted.rank === '6' && cardFormatted.rank !== '6') {
        return true
    }

    if (fightCardFormatted.rank !== '6' && cardFormatted.rank === '6') {
        return false
    }

    if (fightCardFormatted.suit === cardFormatted.suit) {
        const ranks = getRanks()


        return ranks.findIndex(rank => rank === fightCardFormatted.rank) > ranks.findIndex(rank => rank === cardFormatted.rank)
    }

    return false
}
