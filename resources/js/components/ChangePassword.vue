<template>
    <div id="changePassword" class="modal fade" tabindex="-1" aria-labelledby="changePassword">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">{{ $t('changePassword') }}</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" :aria-label="$t('close')"/>
                </div>
                <form class="modal-body">
                    <input type="text" name="email" class="d-none" autocomplete="username email">

                    <p>{{ $t('changePasswordDesc') }}</p>
                    <p>{{ $t('changePasswordDescSecond') }}</p>

                    <Input name="current_password" type="password" autocomplete="current-password"
                           v-model="current_password" :label="$t('currentPassword')"/>

                    <Input name="password" type="password" autocomplete="new-password" v-model="password"
                           :label="$t('newPassword')"/>

                    <Input name="password_confirmation" type="password" autocomplete="new-password"
                           v-model="password_confirmation" :label="$t('confirmPassword')"/>
                </form>

                <div class="modal-footer">
                    <Button type="button" class="btn btn-primary" @click.native="change">
                        {{$t('changePassword')}}
                    </Button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {Modal} from "bootstrap";
import Button from "./Button";
import Input from "./Input";

export default {
    name: "ChangePassword",

    components: {
        Button, Input
    },

    data() {
        return {
            modal: null,
            current_password: null,
            password: null,
            password_confirmation: null
        }
    },

    async mounted() {
        this.modal = new Modal(document.getElementById('changePassword'))
    },

    methods: {
        async change() {
            await this.$store.dispatch('admin/changePassword', {
                current_password: this.current_password,
                password: this.password,
                password_confirmation: this.password_confirmation
            })

            window.location = '/'+process.env.MIX_ADMIN_PREFIX
        }
    }
}
</script>
