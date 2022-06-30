const inputErrors = {
    namespaced: true,
    state: {
        errors: []
    },
    mutations: {
        set(state, payload) {
            state.errors.push({
                key: payload.key,
                message: payload.message,
            })
        },
        reset(state){
            state.errors = []
        }
    },
    actions: {
        set(context, payload) {
            context.commit('set', payload)
        },
        reset(context){
            context.commit('reset')
        }
    },
    getters: {
        message: (state) => (key) => {
            return state.errors.filter((message) => message.key === key)[0].message
        },
        has: (state) => (key) => {
            return state.errors.filter((message) => message.key === key).length > 0
        }
    }
}

export default inputErrors
