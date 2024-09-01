export default async function useThrowCard(card, room_id, user_id) {
    await (await this.api)({
        method: 'GET',
        url: '/api/game/discard-card',
        params: { card, room_id, user_id }
    });
}
