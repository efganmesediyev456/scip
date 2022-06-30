<template>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-12">
                <PostListCard :name="$t($store.getters['post/name']($route.params.postType))"
                              :post-type="$route.params.postType"/>
            </div>
        </div>
    </div>
</template>

<script>
import PostListCard from '../../components/PostListCard'

export default {
    name: 'PostList',

    components: {
        PostListCard
    }
}
</script>
