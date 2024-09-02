import { makeApi } from "../axios.js";

export default async function useSetReady(player, room_id) {
    const api = makeApi()

    await (await api)({
        method: 'GET',
        url: `/api/game/set-ready-state/${room_id}`,
        params: { user_id: player }
    });
}
