import axios from "axios";

export default new class {
    async send(message, player, room_id, channel) {
        await axios({
            method: 'GET',
            url: '/api/messages/send',
            params: {message, user_id: player, room_id, room_name: channel}
        })
    }

    async load(room_id, room_name) {
        const response = await axios({
            method: 'GET',
            url: '/api/messages',
            params: { room_id, room_name }
        })

        return response.data
    }
}
