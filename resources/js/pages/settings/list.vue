<template>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold m-0">{{ $t('settings') }}</h5>
                    </div>
                    <div class="card-body">
                        <Table ref="settingsTable" url="/settings" :columns="columns">
                            <template #operations="slotData">
                                <Tooltip :title="$t('edit')">
                                    <router-link :to="{name:'settings-edit', params: {settingsId: slotData.row.id}}"
                                                 class="btn btn-primary btn-sm">
                                        <i class="bi bi-pencil-square"></i>
                                    </router-link>
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
                    name: this.$t('key'),
                    key: 'key',
                    orderBy: 'key',
                },
                {
                    name: this.$t('value'),
                    key: 'value',
                    orderBy: false,
                },
            ]
        }
    }
}
</script>
