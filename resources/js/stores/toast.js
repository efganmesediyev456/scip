const toast = {
    namespaced: true,
    state: {
        messages: []
    },
    mutations: {
        add(state, payload) {
            state.messages.push({
                body: payload.message,
                title: payload.title,
                icon: payload.icon
            })
        },
        shift(state) {
            state.messages.shift()
        }
    },
    actions: {
        show(context, payload) {
            context.commit('add', payload)
        }
    },
    getters: {
        messages(state) {
            return state.messages
        },
        count(state) {
            return state.messages.length
        }
    }
}

export default toast
