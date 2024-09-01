import { makeApi } from "../axios.js";

const api = makeApi()

export default async function useConnectionToken(id) {
    const response = await (await api)({
        method: 'GET',
        url: '/api/auth/token',
        params: { id: id },
        headers: {
            Authorization: localStorage.getItem('token')
        }
    })

    console.log('useConnectionToken', response.data.token)

    return response.data.token
}
