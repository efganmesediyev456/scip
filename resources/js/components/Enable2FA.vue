<template>
  <div
    id="enable2FA"
    class="modal fade"
    tabindex="-1"
    aria-labelledby="enable2FA"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h6
            class="modal-title"
          >
            {{$t('tfaTitle')}}
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
            {{$t('tfaDescription')}}
          </p>

          <p>
            1. {{ $t('tfaScan')}}<a
              target="_blank"
              href="https://support.google.com/accounts/answer/1066447"
            >Google
              Authenticator App</a>. {{$t('tfaScanAlternate')}}
            <span class="text-danger">{{ $store.getters['admin/tfaSecret'] }}</span>

            <br>

            <img
              class="mt-1"
              :src="$store.getters['admin/tfaQr']"
              alt=""
            >
          </p>

          <p>
            2. {{$t('tfaEnter')}}
          </p>
          <form
            id="save2FA"
            @submit.prevent="save"
          >
            <Input
              v-model="pin"
              name="tfa_pin"
              label=""
              placeholder="PIN: XXXXXX"
            />
          </form>
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-secondary"
            data-bs-dismiss="modal"
          >
            {{$t('close')}}
          </button>
          <Button
            type="submit"
            form="save2FA"
            class="btn btn-primary"
          >
            {{$t('save')}}
          </Button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Input from './Input'
import {Modal} from 'bootstrap'
import Button from "./Button";

export default {
    name: "Enable2FA",

    components: {
        Input, Button
    },

    data() {
        return {
            pin: null,
            modal: null
        }
    },

    async mounted() {
        await this.$store.dispatch('admin/getTfa')

        const modalEl = document.getElementById('enable2FA');

        this.modal = new Modal(modalEl)

        const _t = this

        modalEl.addEventListener('show.bs.modal', function (event) {
            _t.pin = null
        })
    },

    methods: {
        async save() {
            await this.$store.dispatch('admin/setTfa', this.pin)
            await this.$store.dispatch('admin/getTfa')
            await this.$store.dispatch('admin/getSMS')
            this.modal.hide()

            this.$store.dispatch('toast/show', {
                title: this.$t('success'),
                icon: 'success',
                message: this.$t('tfaEnabled'),
                time: this.$t('now')
            })
        }
    }
}
</script>
