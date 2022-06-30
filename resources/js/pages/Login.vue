<template>
  <div class="container-fluid h-100">
    <div class="row justify-content-center">
      <div class="col-md-6 col-11 col-lg-4 col-11 py-5">
        <div class="card text-center m-auto">
          <div class="card-body px-5">
            <h4 class="card-title py-4 fw-bold">
              {{ $t('signIn')}}
            </h4>
            <form @submit.prevent="login">
              <Input
                v-model="email"
                :label="$t('email')"
                type="email"
                name="email"
                autocomplete="username"
              />
              <Input
                v-model="password"
                :label="$t('password')"
                type="password"
                name="password"
                autocomplete="current-password"
              />
              <Input
                v-if="$store.getters['admin/requireLoginPin']"
                v-model="pin"
                :label="$t('loginCode')"
                type="text"
                name="pin"
                autocomplete="one-time-code"
              />
              <Button
                type="submit"
                class="btn btn-primary w-100"
              >
                {{ $t('continue')}}
              </Button>
            </form>
            <p class="card-text py-4">
              <small>{{$t('developedBy')}}</small>
              <img
                class="d-block m-auto mt-2"
                src="/assets/admin/static/sf.svg"
                alt="SAFAROFF Agency"
              >
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Input from '../components/Input'
import Button from '../components/Button'
import http from "../plugins/axios";

export default {
    components: {
        Input,
        Button
    },

    data() {
        return {
            appName: process.env.MIX_APP_NAME,
            email: null,
            password: null,
            pin: null,
        }
    },

    mounted() {
        let recaptchaScript = document.createElement('script')
        recaptchaScript.setAttribute('src', 'https://www.google.com/recaptcha/api.js?render=' + process.env.MIX_RECAPTCHA_SITE_KEY)
        document.head.appendChild(recaptchaScript)
    },

    methods: {
        login() {
            let _this = this

            grecaptcha.ready(() => {
                grecaptcha.execute(process.env.MIX_RECAPTCHA_SITE_KEY, {action: 'login'}).then(async (token) => {
                    const data = {
                        email: this.email,
                        password: this.password,
                        recaptcha_token: token
                    };

                    if(_this.pin !== null) {
                        data.pin = _this.pin
                    }

                    const response = (await http.post('admin/auth', data)).data.result

                    if (response.hasOwnProperty('pin_enabled')) {
                        _this.$store.dispatch('admin/requirePinOnLogin')
                    } else if (response.hasOwnProperty('access_token')) {
                        localStorage.setItem('admin_authorization_token', response.access_token)

                        await _this.$store.dispatch('admin/getUser')

                        window.location = '/admin'
                    }
                });
            });
        }
    }
}
</script>

<style lang="scss" scoped>
.container-fluid {
    min-height: 100vh;
    background-color: rgba(24, 28, 50, 1);
}

.card {
    max-width: 400px;
}
</style>
