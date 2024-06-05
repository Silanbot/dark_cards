import axios from "axios";

export default new class {
    async send(user_id, friend_id) {
        await axios({
            method: 'POST',
            url: '/api/friends/send',
            data: { user_id, friend_id }
        })
    }

    async accept(user_id, sender_id) {
        await axios({
            method: 'POST',
            url: '/api/friends/accept',
            data: { user_id, sender_id }
        })
    }

    async load(user_id) {
        await axios({
            method: 'GET',
            url: '/api/friends',
            params: { user_id }
        })
    }

    async pending(user_id) {
        await axios({
            method: 'GET',
            url: '/api/friends/pending',
            params: { user_id }
        })
    }
}
