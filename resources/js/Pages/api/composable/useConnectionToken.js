import { makeApi } from "../axios.js";

export default async function useConnectionToken(id) {
    const api = makeApi()

    const response = await (await api)({
        method: 'GET',
        url: '/api/auth/token',
        params: { id: id }
    })

    return {
        $token: response.data.token
    }
}
