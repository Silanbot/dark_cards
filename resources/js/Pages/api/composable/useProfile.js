import { makeApi } from "../axios.js";

export default async function useProfile(id, username) {
    const api = makeApi()

    const response = await (await api)({
        method: 'GET',
        url: '/api/profile',
        params: { id, username },
        headers: { Authorization: localStorage.getItem('token') }
    })

    return response.data
}
