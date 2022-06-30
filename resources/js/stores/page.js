const page = {
    namespaced: true,
    state: {
        types: [
            {
                value: '1',
                name: 'mainPage',
                posts: [

                    {
                        value: '2',
                        name: 'slider',
                    },
                    {
                        value: '3',
                        name: 'details',
                    },
                    {
                        value: '4',
                        name: 'advantages',
                    },
                    {
                        value: '5',
                        name: 'maps',
                    },
                    {
                        value: '6',
                        name: 'qarabag',
                    },
                    {
                        value: '10',
                        name: 'missions',
                    },
                ]
            },
            {
                value: '2',
                name: 'content',
                posts: []
            },
            {
                value:'3',
                name:"news",
                posts:[]
            },
            {
                value:'4',
                name:"redirect",
                posts:[]
            },
            {
                value:'5',
                name:"advertisements",
                posts:[]
            }, {
                value:'6',
                name:"multimedia",
                posts:[]
            },
            {
                value:'7',
                name:"fag",
                posts:[]
            },
            {
                value:'8',
                name:"about",
                posts:[]
            },
            {
                value:'9',
                name:"leadership",
                posts:[
                    {
                        value: '13',
                        name: 'leadership',
                    },
                ]
            },

            {
                value:'10',
                name:"struktur",
                posts:[]
            },
            {
                value:'11',
                name:"reports",
                posts:[ {
                    value: '14',
                    name: 'reports',
                },
                ]
            },
            {
                value:'12',
                name:"centre",
            },
            {
                value:'13',
                name:"lows",
                posts:[ {
                    value: '15',
                    name: 'lows',
                },
                ]
            },
            {
                value:'14',
                name:"grafik",
                posts:[ {
                    value: '16',
                    name: 'grafik',
                },
                ]
            },
            {
                value:'15',
                name:"contact",
                posts:[ {
                    value: '17',
                    name: 'contact',
                },
                ]
            },

            {
                value:'16',
                name:"suggestion",
            },
            {
                value:'17',
                name:"park",
            },
            {
                value:'18',
                name:"industry",
                posts:[ {
                    value: '18',
                    name: 'industry_about',
                },{
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
                ]
            },

            {
                value:'19',
                name:"agro_park",
                posts:[
                    {
                        value: '18',
                        name: 'industry_about',
                    },
                    {
                        value: '19',
                        name: 'priorities',
                    },
                    {
                        value: '25',
                        name: 'plan_image',
                    },
                    {
                        value: '21',
                        name: 'infrastructure',
                    },

                    {
                        value: '22',
                        name: 'logistic',
                    },
                ]
            },
            {
                value:'20',
                name:"rezident",
            },
            {
                value:'21',
                name:"leaderships",
            },


        ],
    },
    mutations: {},
    actions: {},
    getters: {
        types(state) {
            return state.types
        }
    }
}

export default page
