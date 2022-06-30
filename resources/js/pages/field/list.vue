<template>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold m-0">{{ $t('fields') }}</h5>
                        <router-link :to="{name:'field-create'}" class="btn btn-primary">
                            {{ $t('create') }}
                        </router-link>
                    </div>
                    <div class="card-body">
                        <Table :hide-filter="false" ref="adminsTable" url="/fields" :columns="columns">
                            <template #filters="slotData">
                                <div class="dropdown-menu filter-dropdown dropdown-menu-right"
                                     aria-labelledby="filterDropDownButton">
                                    <Select
                                        name="type"
                                        v-model="filters.type"
                                        :options="$store.getters['field/types']"
                                        :label="$t('type')"
                                    />
                                    <Button type="submit" @click.native="filter" class="btn btn-primary">Apply</Button>
                                </div>
                            </template>
                            <template #operations="slotData">
                                <Tooltip v-if="['select','radio','multiselect'].includes(slotData.row.type)"
                                         :title="$t('fieldValues')">
                                    <router-link :to="{name:'field-value-list', params: {fieldId: slotData.row.id}}"
                                                 class="btn btn-primary btn-sm">
                                        <i class="bi bi-node-plus"></i>
                                    </router-link>
                                </Tooltip>
                                <Tooltip :title="$t('edit')">
                                    <router-link :to="{name:'field-edit', params: {id: slotData.row.id}}"
                                                 class="btn btn-primary btn-sm">
                                        <i class="bi bi-pencil-square"></i>
                                    </router-link>
                                </Tooltip>
                                <Tooltip :title="$t('delete')">
                                    <Button type="submit" @click.native="removeField(slotData.row.id)"
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
    name: 'FieldList',
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
                },
                {
                    name: this.$t('type'),
                    key: 'type',
                    orderBy: 'type',
                },
                {
                    name: this.$t('groupType'),
                    key: 'group_type',
                    orderBy: false,
                },
                {
                    name: this.$t('required'),
                    key: 'required',
                    orderBy: 'required',
                },
                {
                    name: this.$t('shownOnTable'),
                    key: 'shown_on_table',
                    orderBy: 'shown_on_table',
                },
                {
                    name: this.$t('createdAt'),
                    key: 'created_at',
                    orderBy: 'created_at',
                },
            ]
        }
    },

    methods: {
        async removeField(id) {
            await http.delete('fields/' + id)

            await this.$store.dispatch('toast/show', {
                title: this.$t('success'),
                icon: 'success',
                message: this.$t('fieldRemoved'),

            })

            await this.$refs.adminsTable.getResults()
        },

        async filter() {
            await this.$refs.adminsTable.getResults(this.filters)
        }
    }
}
</script>
