<template>
    <div class="table-container">
        <div class="table-top d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center justify-content-start">
                <span class="me-2">{{ $t('show') }}</span>
                <select v-model="perPage" class="form-select form-select-sm">
                    <option value="15">15</option>
                    <option value="30">30</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <span class="ms-2">{{ $t('entries') }}</span>
            </div>

            <div class="search d-flex justify-content-end align-items-center">
                <div class="input-group">
                    <input v-model.lazy="keywords" type="text" class="form-control form-control-sm"
                           :placeholder="$t('search')"
                           @change="getResults">
                    <span class="input-group-text"><i class="bi bi-search"/></span>
                </div>

                <div class="dropdown" v-if="!hideFilter">
                    <button id="filterDropDownButton" class="btn btn-primary ms-2 dropdown-toggle" type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                        <i class="bi bi-funnel-fill"/>
                    </button>
                    <slot name="filters"/>
                </div>

                <button @click="getResults" class="btn btn-secondary ms-2">
                    <i class="bi bi-arrow-clockwise"></i>
                </button>
            </div>
        </div>

        <div v-if="result.data===null" class="text-input__loading">
            <div v-for="n in 3" :key="n" class="text-input__loading--line"/>
        </div>

        <div class="table-responsive" v-else-if="result.data!==null && result.data.length > 0">
            <table class="table table-hover table-borderless mb-0">
                <thead>
                <tr>
                    <th v-for="column in columns" :key="column.key+'-head'"
                        :class="{'sortable': column.orderBy }"
                        :style="{width: column.width}"
                        scope="col"
                        @click="order(column.orderBy)">{{ column.name }}
                        <i v-if="column.orderBy" v-show="orderBy === column.orderBy && orderDir === 'desc'"
                           class="bi bi-sort-down"/>
                        <i v-if="column.orderBy" v-show="orderBy === column.orderBy && orderDir === 'asc'"
                           class="bi bi-sort-up"/>
                    </th>
                    <th/>
                </tr>
                </thead>
                <tbody>
                <tr v-for="row in result.data" :key="row.id+'-row'">
                    <td v-for="column in columns" :key="column.key+'-body-'+row.id+'-row'" v-html="row[column.key]"/>
                    <td class="text-end">
                        <slot name="operations" :query-parameters="queryParameters" :row="row"/>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div v-else class="no-result">
            <p class="text-center my-3">
                {{ $t('noResult') }}
            </p>
        </div>

        <div class="table-bottom d-flex justify-content-between align-items-center">
            <span>Showing {{ result.data ? result.data.length : 0 }} of {{ result.meta.total }} items</span>
            <ul class="pagination justify-content-center pagination-sm mb-0">
                <li class="page-item" :class="{disabled: !result.links.prev}">
                    <button :disabled="!result.links.prev" :aria-disabled="!result.links.prev" class="page-link"
                            tabindex="-1"
                            @click="prevPage"> {{ $t('previous') }}
                    </button>
                </li>
                <li class="page-item" :class="{disabled: !result.links.next}">
                    <button class="page-link" :disabled="!result.links.next" :aria-disabled="!result.links.next"
                            @click="nextPage"> {{ $t('next') }}
                    </button>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import http from '../plugins/axios'

export default {
    name: "Table",

    props: {
        hideFilter: {
            type: Boolean,
            default: true
        },
        columns: {
            type: Array,
            required: true
        },
        url: {
            type: String,
            required: true
        },
        initialPerPage: {
            type: Number,
            default: 15
        },
        initialOrderBy: {
            type: String,
            default: 'id'
        },
        initialOrderDir: {
            type: String,
            default: 'desc',
            validator(value) {
                return ['asc', 'desc'].includes(value)
            }
        },
        badge: {
            type: Boolean,
            default: false
        },
        queryParameters: {
            default: null
        },
        badgeLogic: {
            type: Object,
            default: () => {
                {
                }
            }
        }
    },

    data() {
        return {
            result: {
                data: null,
                links: {},
                meta: {}
            },
            keywords: null,
            page: 1,
            orderBy: this.initialOrderBy,
            orderDir: this.initialOrderDir,
            perPage: this.initialPerPage
        }
    },

    watch: {
        perPage() {
            this.page = 1
            this.getResults()
        }
    },

    async mounted() {
        await this.getResults()
    },

    methods: {
        buildUrl(url, parameters) {
            let qs = "";

            for (const key in parameters) {
                if (parameters[key]) {
                    qs += encodeURIComponent(key) + "=" + encodeURIComponent(parameters[key]) + "&";
                }
            }

            if (qs.length > 0) {
                qs = qs.substring(0, qs.length - 1); //chop off last "&"
                url = url + "?" + qs;
            }

            return url;
        },

        async getResults(filters = null) {
            const response = await http.get(this.buildUrl(this.url, {
                ...filters,
                ...this.queryParameters,
                'per_page': this.perPage,
                'page': this.page,
                'paginate': 1,
                'order_by': this.orderBy,
                'order_dir': this.orderDir,
                'keywords': this.keywords
            }))

            if (response.data.result.data && response.data.result.data.length > 0) {
                this.result = response.data.result
            } else {
                this.result.data = []
            }
        },

        order(orderBy) {
            if (orderBy && orderBy !== "0") {
                this.page = 1
                this.orderBy = orderBy
                this.orderDir = this.orderDir === 'desc' ? 'asc' : 'desc'

                this.getResults()
            }
        },

        async nextPage() {
            this.page++;
            await this.getResults()
        },

        async prevPage() {
            this.page--;
            await this.getResults()
        }
    }
}
</script>

<style lang="scss" scoped>

.table-container {
    border: 1px solid #eff2f5;
    border-radius: .475rem;

    .no-result {
        border-top: 1px solid #eff2f5;
    }

    .table-top,
    .table-bottom {
        border-top-left-radius: .475rem;
        border-top-right-radius: .475rem;
        padding: 1rem 1rem;
        border-bottom: 0;
    }

    .table-bottom {
        border-top: 1px solid #eff2f5;
        border-radius: 0;
    }

    table {
        overflow: hidden;

        thead {
            tr {
                background-color: #eff2f5;

                th {
                    position: relative;
                    vertical-align: middle;
                    padding-right: 0;

                    &.sortable {
                        cursor: pointer;
                    }

                    .bi {
                        //position: absolute;
                        //top: 9px;
                        //right: 0;
                        margin-left: 5px;
                    }
                }
            }
        }
    }

    .filter-dropdown {
        padding: 20px;
        box-shadow: 0 0 5px 0 rgb(41 41 41 / 25%);
        min-width: 15rem;
    }
}
</style>
