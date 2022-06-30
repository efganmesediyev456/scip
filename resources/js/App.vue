<template>
  <div>
    <div
      v-if="$store.getters['toast/count']"
      class="toast-container position-fixed"
    >
      <Toast
        v-for="(message, id) in $store.getters['toast/messages']"
        :key="id"
        :message="message"
      />
    </div>
    <div
      v-if="!$route.meta.hideNav"
      class="container-fluid p-0"
    >
      <Nav />
    </div>
    <router-view v-else />
    <vue-progress-bar />
  </div>
</template>

<script>
import Toast from './components/Toast'
import Nav from './components/Nav'

export default {
    components: {
        Toast, Nav
    },

    mounted() {
        //  [App.vue specific] When App.vue is finish loading finish the progress bar
        this.$Progress.finish()
    },
    created() {
        //  [App.vue specific] When App.vue is first loaded start the progress bar
        this.$Progress.start()
        //  hook the progress bar to start before we move router-view
        this.$router.beforeEach((to, from, next) => {
            //  does the page we want to go to have a meta.progress object
            if (to.meta.progress !== undefined) {
                let meta = to.meta.progress
                // parse meta tags
                this.$Progress.parseMeta(meta)
            }
            //  start the progress bar
            this.$Progress.start()
            //  continue to next page
            next()
        })
        //  hook the progress bar to finish after we've finished moving router-view
        this.$router.afterEach((to, from) => {
            //  finish the progress bar
            this.$Progress.finish()
        })
    }
};
</script>

<style lang="scss" scoped>
.toast-container {
    top: 20px;
    right: 20px;
    z-index: 99999;
}
</style>
