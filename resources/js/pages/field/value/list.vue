<template>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold m-0">{{ $t('fieldValues') }}</h5>
                        <router-link :to="{name:'field-value-create', params: {id: $route.params.fieldId}}"
                                     class="btn btn-primary">
                            {{ $t('create') }}
                        </router-link>
                    </div>
                    <div class="card-body">
                        <Table :hide-filter="false" ref="adminsTable" :url="'/fields/'+$route.params.fieldId+'/values'"
                               :columns="columns">
                            <template #operations="slotData">
                                <Tooltip :title="$t('edit')">
                                    <router-link
                                        :to="{name:'field-value-edit', params: {fieldId: $route.params.fieldId, fieldValueId: slotData.row.id}}"
                                        class="btn btn-primary btn-sm">
                                        <i class="bi bi-pencil-square"></i>
                                    </router-link>
                                </Tooltip>
                                <Tooltip :title="$t('delete')">
                                    <Button type="submit" @click.native="removeFieldValue(slotData.row.id)"
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
import Table from '../../../components/Table'
import Tooltip from '../../../components/Tooltip'
import Button from '../../../components/Button'
import Select from '../../../components/Select'
import http from "../../../plugins/axios";

export default {
    name: 'FieldValueList',
    components: {
        Table, Button, Tooltip, Select
    },
    data() {
        return {
            filters: {
                type: null
            },
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
                }
            ]
        }
    },

    methods: {
        async removeFieldValue(id) {
            await http.delete('fields/' + this.$route.params.fieldId + '/values/' + id);

            await this.$store.dispatch('toast/show', {
                title: this.$t('success'),
                icon: 'success',
                message: this.$t('fieldValueRemoved'),

            })

            await this.$refs.adminsTable.getResults()
        }
    }
}
</script>
