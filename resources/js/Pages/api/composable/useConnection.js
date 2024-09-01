import { makeApi } from "../axios.js";

export default async function useConnection($id, profile) {
    const api = makeApi()

    console.log(profile.username)
    const response = await (await api)({
        method: 'GET',
        url: '/api/game/join',
        params: { room_id: $id, user_id: profile.id },
        headers: { Authorization: localStorage.getItem('token') }
    })

    return {
        $players: response.data
    }
}
