const post = {
    namespaced: true,
    state: {
        types: [
            {
                value: '1',
                name: 'news',
                icon: 'bi bi-newspaper'
            },
            {
                value: '2',
                name: 'slider'
            },
            {
                value: '3',
                name: 'details'
            },
            {
                value: '4',
                name: 'advantages'
            },
            {
                value: '5',
                name: 'maps'
            },
            {
                value: '6',
                name: 'qarabag'
            },
            {
                value: '7',
                name: 'advertisements',
                icon: 'bi bi-newspaper'
            },
            {
                value: '8',
                name: 'photogallery',
                icon: 'bi bi-newspaper'
            },
            {
                value: '9',
                name: 'videogallery',
                icon: 'bi bi-newspaper'
            },
            {
                value: '10',
                name: 'missions',
            },
            {
                value: '11',
                name: 'fag',
                icon: 'bi bi-newspaper'
            },
            {
                value: '12',
                name: 'links',
                icon: 'bi bi-newspaper'
            },
            {
                value: '13',
                name: 'leadership',
            },
            {
                value: '14',
                name: 'reports',
            },
            {
                value: '15',
                name: 'lows',
            },
            {
                value: '16',
                name: 'grafik',
            },
            {
                value: '17',
                name: 'contact',
            },

            {
                value: '18',
                name: 'industry_about',
            },
            {
                value: '19',
                name: 'priorities',
            },
            {
                value: '20',
                name: 'plan',
            },
            {
                value: '21',
                name: 'infrastructure',
            },
            {
                value: '22',
                name: 'logistic',
            },
            {
                value: '23',
                name: 'selected_products',
            },
            {
                value: '24',
                name: 'rezidents',
            },
            {
                value: '25',
                name: 'plan_image',
            },
            {
                value: '26',
                name: 'leaderships',
                icon: 'bi bi-newspaper'
            },
        ]
    },
    mutations: {},
    actions: {},
    getters: {
        types(state) {
            return state.types
        },
        name: (state) => (postType) => {
            return state.types.filter((t) => t.value === postType)[0].name
        }
    }
}

export default post
