import { makeApi } from './axios.js';

export default new (class {
    api  = makeApi()

	async profile(id, username) {
        console.log(id, username)
		const response = await (await this.api)({
			method: 'GET',
			url: '/api/profile',
			params: { id, username }
		});

		return response.data;
	}

	async generateConnectionToken(id) {
		const response = await (await this.api)({
			method: 'GET',
			url: '/api/auth/token',
			params: { id }
		});

		return response.data.token;
	}
})();
