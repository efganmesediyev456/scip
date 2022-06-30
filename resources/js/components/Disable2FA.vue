<template>
    <div
        id="disable2FA"
        class="modal fade"
        tabindex="-1"
        aria-labelledby="disable2FA"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6
                        class="modal-title"
                    >
                        {{ $t('tfaTitle') }}
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
                        {{ $t('tfaDescription') }}
                    </p>

                    <p>
                        {{ $t('tfaAreYouSure') }}
                    </p>
                </div>
                <div class="modal-footer">
                    <Button
                        type="button"
                        class="btn btn-secondary"
                        @click.native="disable2FA"
                    >
                        {{ $t('tfaRemove') }}
                    </Button>
                    <button
                        type="button"
                        class="btn btn-success"
                        data-bs-dismiss="modal"
                    >
                        {{ $t('neverMind') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {Modal} from "bootstrap";
import Button from "./Button";

export default {
    name: "Disable2FA",

    components: {
        Button
    },

    data() {
        return {
            modal: null
        }
    },

    async mounted() {
        this.modal = new Modal(document.getElementById('disable2FA'))
    },

    methods: {
        async disable2FA() {
            await this.$store.dispatch('admin/disableTfa')
            await this.$store.dispatch('admin/getTfa')

            this.modal.hide()

            this.$store.dispatch('toast/show', {
                title: this.$t('success'),
                icon: 'success',
                message: this.$t('tfaDisabled'),
                time: this.$t('now')
            })
        }
    }
}
</script>
