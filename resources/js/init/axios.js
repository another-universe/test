import axios from 'axios';

window.axios = axios.create({
    baseURL: `${location.protocol}//${location.hostname}`,
    timeout: 1500,
    headers: {
        common: {
            Accept: 'application/json, */*',
            'X-Requested-With': 'XMLHttpRequest',
        },
    },
});
