import axios from 'axios';
import telegram from './telegram.js';

const isDev = import.meta.env.MODE === "development";
const localMockUser = localStorage.getItem("usr")


let api
export const makeApi = async () => {
    if (api !== undefined) return api;

    api = axios.create({});
    const profile = isDev && localMockUser ? JSON.parse(localMockUser) : await telegram.profile()
    const tokenData = (await api.post(`/api/authorize?web_app_data=${JSON.stringify(profile)}`)).data;
    const authData = `${tokenData.token_type} ${tokenData.token}`
    localStorage.setItem('token', authData)
    localStorage.setItem('profile', JSON.stringify(profile))
    api.interceptors.request.use(config => {
        config.headers['Authorization'] = authData;
        return config;
    });

    return api
}
