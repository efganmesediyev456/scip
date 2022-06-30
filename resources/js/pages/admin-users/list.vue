<template>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold m-0">{{ $t('adminUsers') }}</h5>
                        <router-link :to="{name:'admin-users-create'}" class="btn btn-primary">
                            {{ $t('create') }}
                        </router-link>
                    </div>
                    <div class="card-body">
                        <Table ref="adminsTable" url="/admin/users" :columns="columns">
                            <template #operations="slotData">
                                <Tooltip :title="$t('edit')">
                                    <router-link :to="{name:'admin-users-edit', params: {id: slotData.row.id}}"
                                                 class="btn btn-primary btn-sm">
                                        <i class="bi bi-pencil-square"></i>
                                    </router-link>
                                </Tooltip>
                                <Tooltip :title="$t('resetPassword')">
                                    <Button type="submit" @click.native="resetPassword(slotData.row.id)"
                                            class="btn btn-primary btn-sm">
                                        <i class="bi bi-key"></i>
                                    </Button>
                                </Tooltip>
                                <Tooltip :title="$t('delete')">
                                    <Button type="submit" @click.native="removeAdminUser(slotData.row.id)"
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
import http from "../../plugins/axios";

export default {
    name: 'AdminUsersList',
    components: {
        Table, Button, Tooltip
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
                    orderBy: 'name',
                },
                {
                    name: this.$t('company'),
                    key: 'company',
                    orderBy: 'company',
                },
                {
                    name: this.$t('position'),
                    key: 'position',
                    orderBy: 'position',
                },
                {
                    name: this.$t('phone'),
                    key: 'phone',
                    orderBy: false,
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
        async removeAdminUser(id) {
            await http.delete('admin/users/' + id);

            await this.$store.dispatch('toast/show', {
                title: this.$t('success'),
                icon: 'success',
                message: this.$t('adminRemoved'),

            })

            await this.$refs.adminsTable.getResults()
        },

        async resetPassword(id) {
            await http.patch('admin/users/' + id + '/reset');

            await this.$store.dispatch('toast/show', {
                title: this.$t('success'),
                icon: 'success',
                message: this.$t('adminPasswordReset'),

            })

            await this.$refs.adminsTable.getResults()
        }
    }
}
</script>
