import { makeApi } from './axios.js';

export default new (class {
    api  = makeApi()

	async ready(user_id, room_id) {
		await (await this.api)({
			method: 'GET',
			url: `/api/game/set-ready-state/${room_id}`,
			params: { user_id }
		});
	}

    async leave(user_id, room) {
        await (await this.api)({
            method: 'GET',
            url: '/api/game/leave',
            params: {id: room, user_id: user_id}
        })
    }

	async fight(room_id, card, fight_card, user_id) {
		await (await this.api)({
			method: 'GET',
			url: `/api/game/fight`,
			params: { room_id, card, fight_card, user_id }
		});
	}

	async revert(room_id, card, player) {
		await (await this.api)({
			method: 'GET',
			url: '/api/game/revert-card',
			params: { room_id, card: card, player: player }
		});
	}

	async discard(card, room_id, user_id) {
		await (await this.api)({
			method: 'GET',
			url: '/api/game/discard-card',
			params: { card, room_id, user_id }
		});
	}

	async takeFromDeck(id, user_id, count) {
		await (await this.api)({
			method: 'GET',
			url: '/api/game/take-from-deck',
			params: { id, user_id, count }
		});
	}

    async takeFromTable(id, player) {
        await (await this.api)({
            method: 'GET',
            url: '/api/game/take-from-table',
            params: { id, player }
        })
    }

	async beats(room_id, user_id) {
		await (await this.api)({
			method: 'GET',
			url: '/api/game/beats',
			params: { id: room_id, player: user_id }
		});
	}

	async createGame(bank, game_type, user_id, settings) {
		const response = await (await this.api)({
			method: 'POST',
			url: '/api/create-game',
			data: { bank, game_type, user_id, settings }
		});

		return response.data;
	}

	async joinByPassword(password) {
		const response = await (await this.api)({
			method: 'GET',
			url: '/join-by-password',
			params: {
				password: password
			}
		});

		return response.data;
	}

    async findRoomID(bank, type, maxPlayers) {
        const response = await (await this.api)({
            method: 'POST',
            url: '/api/game/searching',
            data: { bank, type, max_players: maxPlayers }
        })

        return response.data.room_id
    }
})();
