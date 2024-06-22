import { api } from './axios.js';

export default new (class {
	async ready(user_id, room_id) {
		await api({
			method: 'GET',
			url: `/api/game/set-ready-state/${room_id}`,
			params: { user_id }
		});
	}

	async takeFromDeck(id, user_id, count) {
		await api({
			method: 'GET',
			url: '/api/game/take-from-deck',
			params: { id, user_id, count }
		});
	}

	async createGame(bank, game_type, user_id) {
		const response = await api({
			method: 'POST',
			url: '/api/create-game',
			data: { bank, game_type, user_id }
		});

		return response.data;
	}

	async joinByPassword(password) {
		const response = await api({
			method: 'GET',
			url: '/join-by-password',
			params: {
				password: password
			}
		});

		return response.data;
	}
})();
