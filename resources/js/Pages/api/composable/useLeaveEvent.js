import { makeApi } from "../axios.js";

export default async function useLeaveEvent(room_id, id) {
    const api = makeApi()

    await (await this.api)({
        method: 'GET',
        url: '/api/game/leave',
        params: {id: room_id, user_id: id}
    })
}
