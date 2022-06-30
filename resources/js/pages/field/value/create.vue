<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold m-0">
                            {{ $t('createNewFieldValue') }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <form
                            class="w-100 d-flex"
                            @submit.prevent="save"
                        >
                            <div class="container-fluid">
                                <div class="row">
                                    <Input
                                        v-for="locale in $i18n.availableLocales"
                                        :key="'name-'+locale"
                                        v-model="name[locale]"
                                        class="col-md-4"
                                        :name="'name-'+locale"
                                        :label="$t('name')+' '+locale.toUpperCase()"
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
import Button from '../../../components/Button'
import Input from '../../../components/Input'
import Select from '../../../components/Select'
import http from "../../../plugins/axios";

export default {
    name: 'FieldValueCreate',

    components: {
        Button, Input, Select
    },

    data() {
        return {
            name: {
                az: null,
                en: null,
                ru: null
            },
        }
    },

    methods: {
        async save() {
            await http.post('fields/' + this.$route.params.fieldId + '/values', {
                name: this.name
            })

            await this.$store.dispatch('toast/show', {
                title: this.$t('success'),
                icon: 'success',
                message: this.$t('fieldValueCreated'),

            })

            this.$router.push({name: 'field-value-list', params: {fieldId: this.$route.params.fieldId}})
        },
    }
}
</script>
