<template>
    <button :type="type">
<!--        <span v-if="type==='submit' && $store.getters['loading/state']" class="spinner-border spinner-border-sm"-->
<!--              role="status" aria-hidden="true"/>-->
        <slot class="ms-2"/>
    </button>
</template>

<script>
export default {
    name: 'Button',
    props: {
        type: {
            type: String,
            required: true
        }
    }
}
</script>
