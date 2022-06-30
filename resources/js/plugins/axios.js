/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
import app from '../app.js';



const http = axios.create({
    baseURL: process.env.MIX_API_URL
});

http.interceptors.request.use(config => {
    app.$Progress.start();
    app.$store.dispatch('loading/start')
    app.$store.dispatch('inputErrors/reset')

    if (localStorage.getItem('admin_authorization_token') !== null) {
        config.headers['Authorization'] = 'Bearer ' + localStorage.getItem('admin_authorization_token');
    }

    return config;
}, error => {
    app.$Progress.fail();
    // app.$store.dispatch('loading/stop')
    return Promise.reject(error);
});

http.interceptors.response.use(response => {
    app.$Progress.finish();
    app.$store.dispatch('loading/stop')
    return response;
}, async (error) => {
    if (error.response.status === 422) {
        await app.$store.dispatch('toast/show', {
            title: app.$t('validationError'),
            icon: 'warning',
            message: error.response.data.message,
            time: app.$t('now')
        })

        const errors = error.response.data.errors;

        if (errors) {
            for (const err in errors) {
                await app.$store.dispatch('inputErrors/set', {
                    key: err,
                    message: error.response.data.errors[err]
                })
            }
        }
    }

    if (error.response.status === 500) {
        await app.$store.dispatch('toast/show', {
            title: app.$t('systemError'),
            icon: 'error',
            message: error.response.data.message,
            time: app.$t('now')
        })
    }

    if (error.response.status === 400) {
        await app.$store.dispatch('toast/show', {
            title: app.$t('error'),
            icon: 'error',
            message: error.response.data.message,
            time: app.$t('now')
        })
    }

    if (error.response.status === 403) {
        await app.$store.dispatch('toast/show', {
            title: app.$t('accessDenied'),
            icon: 'warning',
            message: app.$t('noPermission'),
            time: app.$t('now')
        })
    }

    if (error.response.status === 401) {
        const originalRequest = error.config

        if (error.config.url === 'admin/auth' && error.config.method==='patch') {
            await app.$store.dispatch('admin/clear')

            window.location = '/'+process.env.MIX_ADMIN_URL
        }

        const refreshResponse = (await http.patch('admin/auth')).data.result

        const accessToken = refreshResponse.access_token

        localStorage.setItem('admin_authorization_token', refreshResponse.access_token)

        await app.$store.dispatch('admin/getUser')

        originalRequest.headers.Authorization = 'Bearer ' + accessToken

        return http(originalRequest)
    }

    app.$Progress.fail();
    await app.$store.dispatch('loading/stop')

    return Promise.reject(error);
});

const token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    http.defaults.headers.common['X-CSRF-TOKEN'] = token.content
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

http.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
http.defaults.headers.common['Accept'] = 'application/json';
http.defaults.headers.common['Accept-Language'] = localStorage.getItem('language') || 'az';

export default http;
