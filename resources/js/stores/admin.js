import http from '../plugins/axios'

const admin = {
    namespaced: true,
    state: {
        sms_enabled: false,
        user: null,
        require_pin: false,
        tfa: {
            secret: null,
            qr: null,
            enabled: false
        },
        roles: [
            {
                value: 'admin',
                name: 'admin'
            }
        ]
    },
    mutations: {
        setUser(state, payload) {
            state.user = payload
        },

        clear(state) {
            state.user = null
            localStorage.removeItem('admin_authorization_token')
        },

        setTfa(state, payload) {
            state.tfa.secret = payload.secret
            state.tfa.qr = payload.qr
            state.tfa.enabled = payload.enabled
        },

        setSMS(state, sms_enabled) {
            state.sms_enabled = sms_enabled
        },

        requirePinOnLogin(state) {
            state.require_pin = true
        }
    },
    actions: {
        async getUser(context) {
            const response = await http.get('admin/auth')
            context.commit('setUser', response.data.result)
        },

        async logout(context) {
            await http.delete('admin/auth')
            context.commit('clear')
        },

        clear(context) {
            context.commit('clear')
        },

        async getTfa(context) {
            const response = await http.get('admin/2fa')
            context.commit('setTfa', response.data.result)
        },

        async setTfa(context, pin) {
            await http.post('admin/2fa', {
                secret: context.state.tfa.secret,
                pin: pin,
            })
        },

        async disableTfa(context) {
            await http.delete('admin/2fa')
        },

        async getSMS(context) {
            const response = await http.get('admin/2fa/sms')
            context.commit('setSMS', response.data.result.enabled)
        },

        requirePinOnLogin(context) {
            context.commit('requirePinOnLogin')
        },

        async changePassword(context, input) {
            await http.post('admin/password', input)

            context.commit('clear')
        },
    },
    getters: {
        token(state) {
            return state.token
        },
        authenticated(state) {
            return localStorage.hasOwnProperty('admin_authorization_token') && state.user !== null
        },
        user(state) {
            return state.user
        },
        tfaEnabled(state) {
            return state.tfa.enabled === "1"
        },
        tfaSecret(state) {
            return state.tfa.secret
        },
        tfaQr(state) {
            return state.tfa.qr
        },
        smsEnabled(state) {
            return state.sms_enabled === "1"
        },
        requireLoginPin(state) {
            return state.require_pin
        },
        roles(state) {
            return state.roles
        }
    }
}

export default admin
