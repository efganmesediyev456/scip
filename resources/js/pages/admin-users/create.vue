<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold m-0">
                            {{ $t('createNewAdmin') }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <form
                            class="w-100 d-flex"
                            @submit.prevent="save"
                        >
                            <div class="container-fluid">
                                <div class="row">
                                    <Input
                                        v-model="adminData.name"
                                        class="col-md-4"
                                        name="name"
                                        :label="$t('name')"
                                    />
                                    <Input
                                        v-model="adminData.position"
                                        class="col-md-4"
                                        name="position"
                                        :label="$t('position')"
                                    />
                                    <Input
                                        v-model="adminData.company"
                                        class="col-md-4"
                                        name="company"
                                        :label="$t('company')"
                                    />
                                    <Input
                                        v-model="adminData.phone"
                                        class="col-md-4"
                                        name="phone"
                                        :label="$t('phone')"
                                    />
                                    <Input
                                        v-model="adminData.email"
                                        class="col-md-4"
                                        type="email"
                                        name="email"
                                        :label="$t('email')"
                                    />

                                    <Select
                                        name="role"
                                        v-model="adminData.role"
                                        class="col-md-4"
                                        :options="$store.getters['admin/roles']"
                                        :label="$t('role')"
                                    />
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <Button
                                            type="submit"
                                            class="btn btn-primary ms-auto"
                                        >
                                            {{ $t('save') }}
                                        </Button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Button from '../../components/Button'
import Input from '../../components/Input'
import Select from '../../components/Select'
import http from "../../plugins/axios";

export default {
    name: 'AdminUsersCreate',

    components: {
        Button, Input, Select
    },

    data() {
        return {
            adminData: {
                name: null,
                position: null,
                company: null,
                phone: null,
                email: null,
                role: null
            }
        }
    },

    methods: {
        async save() {
            await http.post('admin/users', this.adminData)

            await this.$store.dispatch('toast/show', {
                title: this.$t('success'),
                icon: 'success',
                message: this.$t('adminCreated'),

            })

            this.$router.push({name: 'admin-users'})
        },
    }
}
</script>
