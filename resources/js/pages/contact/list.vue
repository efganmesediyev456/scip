<template>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold m-0">
                            {{ $t('Contact') }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <Table ref="pagesTable" :url="'/contacts'" :columns="columns">
                            <template #operations="slotData">

                                <Tooltip :title="$t('delete')">
                                    <Button type="submit" @click.native="removePage(slotData.row.id)"
                                            class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash3"></i>
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
        name: 'Contact',

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
                        name: this.$t('surname'),
                        key: 'surname',
                        orderBy: false,
                    },
                    {
                        name: this.$t('email'),
                        key: 'email',
                        orderBy: false,
                    }, {
                        name: this.$t('mobile'),
                        key: 'mobile',
                        orderBy: false,
                    },
                    {
                        name: this.$t('topic'),
                        key: 'topic',
                        orderBy: false,
                    },
                    {
                        name: this.$t('message'),
                        key: 'message',
                        orderBy: false,
                    },
                ]
            }
        },



        methods: {
            async removePage(id) {
                await http.delete('contacts/' + id)

                await this.$store.dispatch('toast/show', {
                    title: this.$t('success'),
                    icon: 'success',
                    message: this.$t('contactRemoved'),

                })

                await this.$refs.pagesTable.getResults()
            },
        }








    }
</script>
