const loading = {
    namespaced: true,
    state: {
        loading: false
    },
    mutations: {
        start(state) {
            state.loading = true
        },
        stop(state) {
            state.loading = false
        }
    },
    actions: {
        start(context, input) {
            context.commit('start')
        },
        stop(context, input) {
            setTimeout(()=>{
                context.commit('stop')
            },500)
        }
    },
    getters: {
        state(state) {
            return state.loading
        }
    }
}

export default loading
