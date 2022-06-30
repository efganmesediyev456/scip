<template>
  <span
    ref="tooltip"
    data-bs-toggle="tooltip"
    :data-bs-placement="placement"
    :title="title"
  >
    <slot />
  </span>
</template>


<script>
import {Tooltip} from 'bootstrap'

export default {
    name: 'Tooltip',

    props: {
        title: {
            type: String,
            required: true
        },
        placement: {
            type: String,
            default: 'top'
        }
    },

    data() {
      return {
          tooltip: null
      }
    },

    mounted() {
        this.tooltip = new Tooltip(this.$refs.tooltip)
    },

    beforeDestroy() {
        this.tooltip.dispose()
    }
}
</script>
