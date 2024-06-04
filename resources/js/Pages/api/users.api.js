import axios from 'axios'

export default new class {
    async profile(id, username) {
        const response = await axios({
            method: 'GET',
            url: '/api/profile',
            params: { id, username }
        })

        return response.data
    }

    async generateConnectionToken(id) {
        const response = await axios({
            method: 'GET',
            url: '/api/auth/token',
            params: { id }
        })

        return response.data.token
    }
}
