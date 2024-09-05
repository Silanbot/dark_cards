import { makeApi } from "../axios.js";

export default async function useTakeFromDeck(id, user_id, count) {
    const api = makeApi()

    await (await api)({
        method: 'GET',
        url: '/api/game/take-from-deck',
        params: { id, user_id, count }
    });
}
