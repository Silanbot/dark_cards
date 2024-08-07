import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

console.log('tg', window.Telegram.WebApp.initDataUnsafe.user)
