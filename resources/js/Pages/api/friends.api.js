import { makeApi } from './axios.js';

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
		await (await this.api)({
			method: 'GET',
			url: '/api/friends',
			params: { user_id }
		});
	}

	async pending(user_id) {
		await (await this.api)({
			method: 'GET',
			url: '/api/friends/pending',
			params: { user_id }
		});
	}
})();
