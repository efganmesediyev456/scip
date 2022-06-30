const field = {
    namespaced: true,
    state: {
        group_types: [
            {
                value: '1',
                name: 'page'
            },
            {
                value: '2',
                name: 'post'
            }
        ],
        types: [
            {value: '1', name: 'string'}, // ok // ok
            {value: '2', name: 'number'}, // ok // ok
            {value: '3', name: 'radio'}, // ok // ok
            {value: '4', name: 'editor'}, // ok // ok
            {value: '5', name: 'textarea'}, // ok // ok
            {value: '6', name: 'select'}, // ok // ok
            {value: '7', name: 'multiselect'}, // ok // ok
            {value: '8', name: 'gallery'}, // - // -
            {value: '9', name: 'date'}, // ok // ok
            {value: '10', name: 'date_range'}, // - // -
            {value: '11', name: 'file'}, // ok // ok
            {value: '12', name: 'files'}, // ok // ok
            {value: '13', name: 'url'}, // ok // ok
            {value: '14', name: 'active_url'}, // ok // ok
            {value: '15', name: 'checkbox'}, // - // -
            {value: '16', name: 'range'}, // - // -
        ]
    },
    mutations: {},
    actions: {},
    getters: {
        group_types(state) {
            return state.group_types
        },
        types(state) {
            return state.types
        }
    }
}

export default field
