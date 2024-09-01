import axios from 'axios';
import telegram from './telegram.js';
import { useWebApp } from "vue-tg";

let api
export const makeApi = async () => {
    if (api !== undefined) return api;

    api = axios.create({});
    const profile = await telegram.profile()
    console.log(profile)
    const tokenData = (await api.post(`/api/authorize?web_app_data=${JSON.stringify(profile)}`)).data;
    const authData = `${tokenData.token_type} ${tokenData.token}`
    api.interceptors.request.use(async config => {
        config.headers['Authorization'] = authData;
        return config;
    });

    return api
}
