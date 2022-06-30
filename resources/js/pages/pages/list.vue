<template>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold m-0">
                            {{ $t('pages') }}
                        </h5>
                        <router-link :to="{name:'page-create'}" class="btn btn-primary">
                            {{ $t('create') }}
                        </router-link>
                    </div>
                    <div class="card-body">
                        <Table ref="pagesTable" :url="'/pages'" :columns="columns">
                            <template #operations="slotData">
                                <Tooltip :title="$t('edit')">
                                    <router-link
                                        :to="{name:'page-edit', params: {pageId: slotData.row.id, pageType: slotData.row.type_id}}"
                                        class="btn btn-primary btn-sm">
                                        <i class="bi bi-pencil-square"></i>
                                    </router-link>
                                </Tooltip>
                                <Tooltip :title="$t('delete')">
                                    <Button type="submit" @click.native="removePage(slotData.row.id)"
                                            class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash3"></i>
                                    </Button>
                                </Tooltip>
                                <Tooltip v-if="slotData.row.published === '0'" :title="$t('publish')">
                                    <Button type="submit" @click.native="publish(slotData.row.id)"
                                            class="btn btn-primary btn-sm">
                                        <i class="bi bi-eye-fill"></i>
                                    </Button>
                                </Tooltip>
                                <Tooltip v-if="slotData.row.published === '1'" :title="$t('hide')">
                                    <Button type="submit" @click.native="hide(slotData.row.id)"
                                            class="btn btn-primary btn-sm">
                                        <i class="bi bi-eye-slash"></i>
                                    </Button>
                                </Tooltip>
                            </template>
                        </Table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Table from '../../components/Table'
import Tooltip from '../../components/Tooltip'
import Button from '../../components/Button'
import Select from '../../components/Select'
import http from "../../plugins/axios";

export default {
    name: 'PageList',
    components: {
        Table, Button, Tooltip, Select
    },
    data() {
        return {
            columns: [
                {
                    name: '#',
                    key: 'id',
                    orderBy: 'id',
                },
                {
                    name: this.$t('name'),
                    key: 'name',
                    orderBy: false,
                },
                {
                    name: this.$t('type'),
                    key: 'type',
                    orderBy: 'type',
                },
                {
                    name: this.$t('parent'),
                    key: 'parent',
                    orderBy: false,
                },
                {
                    name: this.$t('shown_in_menu'),
                    key: 'shown_in_menu',
                    orderBy: 'shown_in_menu',
                },
                {
                    name: this.$t('visits'),
                    key: 'visits',
                    orderBy: false,
                },
            ]
        }
    },

    methods: {
        async removePage(id) {
            await http.delete('pages/' + id)

            await this.$store.dispatch('toast/show', {
                title: this.$t('success'),
                icon: 'success',
                message: this.$t('pageRemoved'),

            })

            await this.$refs.pagesTable.getResults()
        },

        async publish(id) {
            await http.patch('pages/' + id + '/publish')

            await this.$store.dispatch('toast/show', {
                title: this.$t('success'),
                icon: 'success',
                message: this.$t('pagePublished'),

            })

            await this.$refs.pagesTable.getResults()
        },

        async hide(id) {
            await http.patch('pages/' + id + '/hide')

            await this.$store.dispatch('toast/show', {
                title: this.$t('success'),
                icon: 'success',
                message: this.$t('pageHidden'),

            })

            await this.$refs.pagesTable.getResults()
        },
    }
}
</script>
