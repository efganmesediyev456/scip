import Vue from "vue"
import Vuex from 'vuex'

import Route from './plugins/router.js'
import App from './App.vue'

import VueProgressBar from 'vue-progressbar'

import admin from './stores/admin'
import toast from './stores/toast'
import loading from './stores/loading'
import inputErrors from './stores/input-errors'
import post from './stores/post'
import page from './stores/page'
import field from './stores/field'

import i18n from './plugins/i18n';

import CKEditor from '@ckeditor/ckeditor5-vue2';

import * as Sentry from "@sentry/vue";
import { BrowserTracing } from "@sentry/tracing";

Sentry.init({
    Vue,
    dsn: process.env.MIX_SENTRY_LARAVEL_DSN,
    integrations: [
        new BrowserTracing({
            routingInstrumentation: Sentry.vueRouterInstrumentation(Route),
        }),
    ],
    // Set tracesSampleRate to 1.0 to capture 100%
    // of transactions for performance monitoring.
    // We recommend adjusting this value in production
    tracesSampleRate: 1.0,
});

Vue.use( CKEditor );

Vue.use(Vuex)
Vue.use(VueProgressBar, {
    color: '#069F4F',
    failedColor: 'red',
    thickness: '3px',
    transition: {
        speed: '0.2s',
        opacity: '0.6s',
        termination: 300
    },
    autoRevert: true,
    location: 'top',
    inverse: false
})

export const store = new Vuex.Store({
    modules: {
        admin: admin,
        field: field,
        post: post,
        page: page,
        toast: toast,
        loading: loading,
        inputErrors: inputErrors,
    }
})

const app = new Vue({
    el: '#app',
    i18n,
    router: Route,
    store,
    render: h => h(App)
});

export default app;
