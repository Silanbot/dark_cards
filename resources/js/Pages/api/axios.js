import axios from 'axios';
import telegram from './telegram.js';

const api = axios.create({});

const profile = await telegram.profile();
const tokenData = (await api.post(`/api/authorize?web_app_data=${JSON.stringify(profile)}`)).data;
const authData = `${tokenData.token_type} ${tokenData.token}`;
api.interceptors.request.use(config => {
	config.headers['Authorization'] = authData;
	return config;
});

export { api };
