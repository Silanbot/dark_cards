import axios from "axios";

export default new class {
    async ready(user_id, room_id) {
        await axios({
            method: 'GET',
            url: `/api/game/set-ready-state/${room_id}`,
            params: { user_id }
        })
    }

    async start(room_id) {
        await axios({
            method: 'GET',
            url: '/api/game/start-game',
            params: { room_id }
        })
    }

    async takeFromDeck(id, user_id, count) {
        await axios({
            method: 'GET',
            url: '/api/game/take-from-deck',
            params: { id, user_id, count }
        })
    }

    async createGame(bank, game_type, user_id) {
        const response = await axios({
            method: 'POST',
            url: '/api/create-game',
            data: { bank, game_type, user_id }
        })

        return response.data
    }

    async joinByPassword(password) {
        const response = await axios({
            method: 'GET',
            url: '/join-by-password',
            params: {
                password: password
            }
        })

        return response.data
    }
}
