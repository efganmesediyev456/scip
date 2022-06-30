<template>
    <div
        id="enableSMS"
        class="modal fade"
        tabindex="-1"
        aria-labelledby="enableSMS"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6
                        id="exampleModalLabel"
                        class="modal-title"
                    >
                        {{ $t('smsTitle') }}
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
                        {{ $t('smsDescription') }}
                    </p>

                    <p>
                        {{ $t('smsDescriptionSecond') }}
                    </p>

                    <p class="mb-0">
                        1. {{ $t('smsEnableReceive')}}
                        <span class="text-danger">{{ $store.getters['admin/user'].phone }}</span>
                    </p>

                    <button
                        type="submit"
                        class="btn btn-primary my-3"
                        :disabled="smsSent"
                        @click.stop="sendSMS"
                    >
                        <span v-if="!smsSent">{{$t('smsReceive')}}</span>
                        <span v-else>{{ nextSeconds }} {{$t('smsRemainingSeconds')}}</span>
                    </button>

                    <p>
                        2. {{ $t('smsEnter')}}
                    </p>
                    <form
                        id="save"
                        @submit.prevent="save"
                    >
                        <Input
                            v-model="pin"
                            name="otp_pin"
                            label=""
                            placeholder="OTP: XXXXXX"
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
                        form="save"
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
import Button from './Button'
import {Modal} from 'bootstrap'
import http from "../plugins/axios";

export default {
    name: "EnableSMS",

    components: {
        Input, Button
    },

    data() {
        return {
            pin: null,
            smsSent: false,
            nextSeconds: 0
        }
    },

    async mounted() {
        const modalEl = document.getElementById('enableSMS');

        this.modal = new Modal(modalEl)
    },

    methods: {
        async save() {
            await http.post('admin/2fa/sms', {
                pin: this.pin,
            })
            await this.$store.dispatch('admin/getSMS')
            await this.$store.dispatch('admin/getTfa')
            this.modal.hide()

            this.$store.dispatch('toast/show', {
                title: this.$t('success'),
                icon: 'success',
                message: this.$t('smsEnabled'),
                time: this.$t('now')
            })
        },

        async sendSMS() {
            await http.patch('admin/2fa/sms')

            this.smsSent = true
            this.nextSeconds = 180

            const interval = setInterval(() => {
                this.nextSeconds -= 1

                if (this.nextSeconds === 0) {
                    clearInterval(interval)
                    this.smsSent = false
                }
            }, 1000)
        }
    }
}
</script>
