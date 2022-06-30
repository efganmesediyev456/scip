<template>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold m-0">
                            {{ $t('Agricultural_projects') }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <Table ref="pagesTable" :url="'/agricultural_projects'" :columns="columns">
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
                        name: this.$t('full_name'),
                        key: 'full_name',
                        orderBy: false,
                    },
                    {
                        name: this.$t('address'),
                        key: 'address',
                        orderBy: false,
                    },
                    {
                        name: this.$t('email'),
                        key: 'email',
                        orderBy: false,
                    }, {
                        name: this.$t('project'),
                        key: 'project',
                        orderBy: false,
                    },
                    {
                        name: this.$t('district'),
                        key: 'district',
                        orderBy: false,
                    },
                    {
                        name: this.$t('sown_area'),
                        key: 'sown_area',
                        orderBy: false,
                    }, {
                        name: this.$t('processing_area'),
                        key: 'processing_area',
                        orderBy: false,
                    }, {
                        name: this.$t('product'),
                        key: 'product',
                        orderBy: false,
                    }, {
                        name: this.$t('date'),
                        key: 'date',
                        orderBy: false,
                    },{
                        name: this.$t('irrigation_method'),
                        key: 'irrigation_method',
                        orderBy: false,
                    },
                ]
            }
        },



        methods: {
            async removePage(id) {


                await http.delete('agriculture_projects/' + id)

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
