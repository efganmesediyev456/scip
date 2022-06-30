<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold m-0">
                            {{ $t('createRedirect') }}
                        </h5>
                    </div>
                    <div class="card-body">

                        <form
                            class="w-100 d-flex"
                            @submit.prevent="save"
                        >
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="alert alert-primary d-flex align-items-center mb-4">
                                        <i class="bi bi-info-square-fill text-primary" style="font-size: 2.5rem"></i>

                                        <div class="ms-4 d-flex flex-column">
                                            <h4 class="mb-1 text-dark">What is regex?</h4>
                                            <span>A regex is a string of text that allows you to create patterns that help match, locate, and manage text. Let's check some examples:</span>
                                            <ul class="mb-0 mt-2">
                                                <li><pre class="d-inline">my-url*</pre> <span>- URL contains <pre class="d-inline">my-url</pre> prefix</span></li>
                                                <li><pre class="d-inline">my-url</pre> <span>- URL ends with <pre class="d-inline">my-url</pre></span></li>
                                            </ul>
                                        </div>
                                    </div>


                                    <Input
                                        v-model="redirectData.regex"
                                        class="col-md-6"
                                        name="regex"
                                        type="text"
                                        :min-length="0"
                                        :max-length="255"
                                        :label="$t('regex')"
                                    />

                                    <Input
                                        v-model="redirectData.destination"
                                        class="col-md-6"
                                        name="destination"
                                        type="url"
                                        :min-length="0"
                                        :max-length="255"
                                        :label="$t('destination')"
                                    />
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <Button
                                            type="submit"
                                            class="btn btn-primary ms-auto"
                                        >
                                            {{ $t('save') }}
                                        </Button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Button from '../../components/Button'
import Input from '../../components/Input'
import http from "../../plugins/axios";

export default {
    name: 'RedirectCreate',

    components: {
        Button, Input
    },

    data() {
        return {
            redirectData: {
                regex: null,
                destination: null
            }
        }
    },

    methods: {
        async save() {
            await http.post('redirect', this.redirectData)

            await this.$store.dispatch('toast/show', {
                title: this.$t('success'),
                icon: 'success',
                message: this.$t('redirectCreated'),

            })

            this.$router.push({name: 'redirect-list'})
        },
    }
}
</script>
