<template>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold m-0">{{ $t('redirects') }}</h5>
                        <router-link :to="{name:'redirect-create'}" class="btn btn-primary">
                            {{ $t('create') }}
                        </router-link>
                    </div>
                    <div class="card-body">
                        <Table ref="redirectTable" url="/redirect" :columns="columns">
                            <template #operations="slotData">
                                <Tooltip :title="$t('delete')">
                                    <Button type="submit" @click.native="removeRedirect(slotData.row.id)"
                                            class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash3"></i>
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
    name: 'SettingsList',
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
                    name: this.$t('regex'),
                    key: 'regex',
                    orderBy: false,
                },
                {
                    name: this.$t('destination'),
                    key: 'destination',
                    orderBy: false,
                },
            ]
        }
    },

    methods: {
        async removeRedirect(id) {
            await http.delete('redirect/' + id)

            await this.$store.dispatch('toast/show', {
                title: this.$t('success'),
                icon: 'success',
                message: this.$t('redirectRemoved'),

            })

            await this.$refs.redirectTable.getResults()
        }
    }
}
</script>
