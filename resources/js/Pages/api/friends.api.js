import { makeApi } from './axios.js';
import telegram from "./telegram.js";
import axios from "axios";

export default new (class {
    api  = makeApi()

	async send(user_id, friend_id) {
		await (await this.api)({
			method: 'POST',
			url: '/api/friends/send',
			data: { user_id, friend_id }
		});
	}

	async accept(user_id, sender_id) {
		await (await this.api)({
			method: 'POST',
			url: '/api/friends/accept',
			data: { user_id, sender_id }
		});
	}

	async load(user_id) {
        const profile = await telegram.profile();
        const tokenData = await axios.post(`/api/authorize?web_app_data=${JSON.stringify(profile)}`)
        const authData = `${tokenData.data.token_type} ${tokenData.data.token}`

        const friends =  await axios.get('/api/friends/', {
            params: { user_id },
            headers: { Authorization: authData }
        })

        return friends.data
	}

	async pending(user_id) {
		await (await this.api)({
			method: 'GET',
			url: '/api/friends/pending',
			params: { user_id }
		});
	}

    async search(user_id) {
        const profile = await telegram.profile();
        const tokenData = await axios.post(`/api/authorize?web_app_data=${JSON.stringify(profile)}`)
        const authData = `${tokenData.data.token_type} ${tokenData.data.token}`

        const friends =  await axios.get('/api/friends/search', {
            params: { id: user_id },
            headers: { Authorization: authData }
        })

        return friends.data
    }
})();
