import { makeApi } from "../axios.js";

const api = makeApi()

export default async function useConnectionToken(id) {
    const response = await (await api)({
        method: 'GET',
        url: '/api/auth/token',
        params: { id: id }
    })

    return {
        $token: response.data.token
    }
}
