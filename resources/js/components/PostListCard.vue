<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="fw-bold m-0">
                {{ name }}
                {{ $t('posts') }}
            </h5>
            <router-link :to="{name:'post-create', params: {postType: postType}, query: {page_id: this.pageId}}"
                         class="btn btn-primary">
                {{ $t('create') }}
            </router-link>
        </div>
        <div class="card-body">
            <Table ref="postsTable" :url="'/posts/'+postType" :query-parameters="{page_id: this.pageId}"
                   :columns="columns">
                <template #operations="slotData">
                    <Tooltip :title="$t('edit')">
                        <router-link
                            :to="{ name:'post-edit', params: {postId: slotData.row.id, postType: postType}, query: slotData.queryParameters}"
                            class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil-square"></i>
                        </router-link>
                    </Tooltip>
                    <Tooltip :title="$t('delete')">
                        <Button type="submit" @click.native="removePost(slotData.row.id)"
                                class="btn btn-danger btn-sm">
                            <i class="bi bi-trash3"></i>
                        </Button>
                    </Tooltip>
                </template>
            </Table>
        </div>
    </div>
</template>

<script>
import Table from './Table.vue'
import Tooltip from './Tooltip.vue'
import Button from './Button.vue'
import Select from './Select.vue'
import http from "../plugins/axios";

export default {
    name: 'PostListCard',
    components: {
        Table, Button, Tooltip, Select
    },

    props: {
        postType: {
            required: true
        },
        name: {
            required: true
        },
        pageId: {
            default: null
        }
    },

    data() {
        return {
            columns: []
        }
    },

    async mounted() {
        this.columns = (await http.get('posts/' + this.postType + '/columns')).data.result

        this.columns.unshift({
            name: '#',
            key: 'id',
            orderBy: 'id',
        })
        this.columns.push({
            name: this.$t('visits'),
            key: 'visits',
            orderBy: 'visits',
        })
    },

    methods: {
        async removePost(id) {
            await http.delete('posts/' + id)

            await this.$store.dispatch('toast/show', {
                title: this.$t('success'),
                icon: 'success',
                message: this.$t('postRemoved'),

            })

            await this.$refs.postsTable.getResults()
        },
    }
}
</script>
