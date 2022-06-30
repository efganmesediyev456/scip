<template>
  <div
    id="disableSMS"
    class="modal fade"
    tabindex="-1"
    aria-labelledby="disableSMS"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h6
            class="modal-title"
          >
            {{$t('smsTitle')}}
          </h6>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          />
        </div>
        <div class="modal-body">
          <p>
            {{$t('smsDescription')}}
          </p>

          <p>
            {{$t('smsDescriptionSecond')}}
          </p>

          <p>
            {{$t('smsAreYouSure')}}
          </p>
        </div>
        <div class="modal-footer">
          <Button
            type="button"
            class="btn btn-secondary"
            @click.native="disableSMS"
          >
            {{$t('smsRemove')}}
          </Button>
          <button
            type="button"
            class="btn btn-success"
            data-bs-dismiss="modal"
          >
            {{$t('neverMind')}}
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {Modal} from "bootstrap";
import Button from "./Button";
import http from "../plugins/axios";

export default {
    name: "DisableSMS",

    components: {
        Button
    },

    data() {
        return {
            modal: null
        }
    },

    async mounted() {
        this.modal = new Modal(document.getElementById('disableSMS'))
    },

    methods: {
        async disableSMS() {
            await http.delete('admin/2fa/sms')
            await this.$store.dispatch('admin/getSMS')

            this.modal.hide()

            this.$store.dispatch('toast/show', {
                title: this.$t('success'),
                icon: 'success',
                message: this.$t('smsDisabled'),
                time: this.$t('now')
            })
        }
    }
}
</script>
