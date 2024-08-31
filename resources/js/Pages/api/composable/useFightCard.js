export default async function useFightCard(room_id, card, fight_card, user_id) {
    await (await this.api)({
        method: 'GET',
        url: `/api/game/fight`,
        params: { room_id, fight_card, card, user_id }
    });
}
