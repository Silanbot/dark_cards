import { api } from './axios.js';

export default new (class {
	async send(message, player, room_id, channel) {
		await api({
			method: 'POST',
			url: '/api/messages/send',
			data: { message, user_id: player, room_id, room_name: channel }
		});
	}

	async load(room_id, room_name) {
		const response = await api({
			method: 'GET',
			url: '/api/messages',
			params: { room_id, room_name }
		});

		return response.data;
	}
})();
