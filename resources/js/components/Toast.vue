<template>
  <div
    ref="toast"
    class="toast"
    role="alert"
    aria-live="assertive"
    aria-atomic="true"
  >
    <div class="toast-header">
      <i
        v-if="message.icon === 'error'"
        class="bi bi-exclamation-circle text-danger fw-bold"
        aria-label="Error"
      />
      <i
        v-if="message.icon === 'warning'"
        class="bi bi-exclamation-circle text-warning fw-bold"
        aria-label="Warning"
      />
      <i
        v-if="message.icon === 'success'"
        class="bi bi-check-all text-success fw-bold fs-4"
        aria-label="Success"
      />
      <span class="me-auto ms-2">{{ message.title }}</span>
      <small class="text-muted">{{$t('now')}}</small>
      <button
        type="button"
        class="btn-close"
        data-bs-dismiss="toast"
        aria-label="Close"
      />
    </div>
    <div class="toast-body">
      {{ message.body }}
    </div>
  </div>
</template>


<script>
import {Toast} from 'bootstrap'

export default {
    name: 'Toast',

    props: {
        message: {
            type: Object,
            required: true
        }
    },

    mounted() {
        const toast = new Toast(this.$refs.toast)
        toast.show()
    }
}
</script>
