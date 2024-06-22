import { api } from './axios.js';

export default new (class {
	async profile(id, username) {
		const response = await api({
			method: 'GET',
			url: '/api/profile',
			params: { id, username }
		});

		return response.data;
	}

	async generateConnectionToken(id) {
		const response = await api({
			method: 'GET',
			url: '/api/auth/token',
			params: { id }
		});

		return response.data.token;
	}
})();
