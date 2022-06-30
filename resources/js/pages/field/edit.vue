<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold m-0">
                            {{ $t('editField') }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <form
                            class="w-100 d-flex"
                            @submit.prevent="save"
                        >
                            <div class="container-fluid">
                                <div class="row">
                                    <Select
                                        name="groupType"
                                        v-model="fieldData.group_type"
                                        class="col-md-4"
                                        :options="$store.getters['field/group_types']"
                                        :label="$t('groupType')"
                                    />

                                    <Select
                                        name="pageGroupValue"
                                        v-show="fieldData.group_type === '1'"
                                        :disabled="fieldData.group_type !== '1'"
                                        v-model="fieldData.group_value"
                                        class="col-md-4"
                                        :options="$store.getters['page/types']"
                                        :label="$t('page')"
                                    />

                                    <Select
                                        name="postGroupValue"
                                        v-show="fieldData.group_type === '2'"
                                        :disabled="fieldData.group_type !== '2'"
                                        v-model="fieldData.group_value"
                                        class="col-md-4"
                                        :options="$store.getters['post/types']"
                                        :label="$t('post')"
                                    />

                                    <Select
                                        name="type"
                                        v-model="fieldData.type"
                                        class="col-md-4"
                                        :options="$store.getters['field/types']"
                                        :label="$t('type')"
                                    />

                                    <Input
                                        v-model="fieldData.min_length"
                                        :disabled="['2','3','6','7','9','10','11','12'].includes(this.fieldData.type)"
                                        :readonly="['2','3','6','7','9','10','11','12'].includes(this.fieldData.type)"
                                        class="col-md-4"
                                        name="min_length"
                                        type="number"
                                        :min="0"
                                        :label="$t('minLength')"
                                    />

                                    <Input
                                        v-model="fieldData.max_length"
                                        :disabled="['2','3','6','7','5','9','10','11','12'].includes(this.fieldData.type)"
                                        :readonly="['2','3','6','7','5','9','10','11','12'].includes(this.fieldData.type)"
                                        class="col-md-4"
                                        name="max_length"
                                        :min="0"
                                        type="number"
                                        :label="$t('maxLength')"
                                    />

                                    <Input
                                        v-model="fieldData.min"
                                        :disabled="['1','6','7','3','4','5','9','10','11','12','13','14'].includes(this.fieldData.type)"
                                        :readonly="['1','6','7','3','4','5','9','10','11','12','13','14'].includes(this.fieldData.type)"
                                        class="col-md-4"
                                        name="min"
                                        type="number"
                                        :min="0"
                                        :label="$t('min')"
                                    />

                                    <Input
                                        v-model="fieldData.max"
                                        :disabled="['1','6','7','3','4','5','9','10','11','12','13','14'].includes(this.fieldData.type)"
                                        :readonly="['1','6','7','3','4','5','9','10','11','12','13','14'].includes(this.fieldData.type)"
                                        class="col-md-4"
                                        name="max"
                                        :min="0"
                                        type="number"
                                        :label="$t('max')"
                                    />

                                    <Input
                                        v-model="fieldData.step"
                                        :disabled="['1','6','7','3','4','5','9','10','11','12','13','14'].includes(this.fieldData.type)"
                                        :readonly="['1','6','7','3','4','5','9','10','11','12','13','14'].includes(this.fieldData.type)"
                                        class="col-md-4"
                                        name="step"
                                        :label="$t('step')"
                                    />

                                    <Select
                                        name="required"
                                        v-model="fieldData.required"
                                        class="col-md-4"
                                        :options="[
                                            {value: 1, name: $t('yes')},
                                            {value: 0, name: $t('no')},
                                        ]"
                                        :label="$t('required')"
                                    />

                                    <Select
                                        name="shown_on_table"
                                        v-model="fieldData.shown_on_table"
                                        class="col-md-4"
                                        :options="[
                                            {value: 1, name: $t('yes')},
                                            {value: 0, name: $t('no')},
                                        ]"
                                        :label="$t('shownOnTable')"
                                    />

                                    <Select
                                        name="translated"
                                        v-model="fieldData.translated"
                                        class="col-md-4"
                                        :disabled="['2','3','6','7','9','10','11','12','13','14'].includes(this.fieldData.type)"
                                        :readonly="['2','3','6','7','9','10','11','12','13','14'].includes(this.fieldData.type)"
                                        :options="[
                                            {value: 1, name: $t('yes')},
                                            {value: 0, name: $t('no')},
                                        ]"
                                        :label="$t('translated')"
                                    />

                                    <Input
                                        v-for="locale in $i18n.availableLocales"
                                        :key="'name-'+locale"
                                        v-model="fieldData.name[locale]"
                                        class="col-md-4"
                                        :name="'name-'+locale"
                                        :label="$t('name')+' '+locale.toUpperCase()"
                                    />

                                    <Input
                                        v-for="locale in $i18n.availableLocales"
                                        :key="'placeholder-'+locale"
                                        v-model="fieldData.placeholder[locale]"
                                        class="col-md-4"
                                        :name="'placeholder-'+locale"
                                        :label="$t('placeholder')+' '+locale.toUpperCase()"
                                    />

                                    <Input
                                        v-model="fieldData.identifier"
                                        class="col-md-4"
                                        name="identifier"
                                        :label="$t('identifier')"
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
import Select from '../../components/Select'
import http from "../../plugins/axios";

export default {
    name: 'FieldEdit',

    components: {
        Button, Input, Select
    },

    data() {
        return {
            fieldData: {
                group_type: null,
                group_value: null,
                type: null,
                min_length: 0,
                max_length: 255,
                min: 0,
                max: 500,
                step: 'any',
                required: null,
                shown_on_table: null,
                translated: 0,
                name: {
                    az: null,
                    en: null,
                    ru: null
                },
                placeholder: {
                    az: null,
                    en: null,
                    ru: null
                }
            }
        }
    },

    async mounted() {
        this.fieldData = (await http.get('fields/' + this.$route.params.id)).data.result;
    },

    methods: {
        async save() {
            await http.put('fields/' + this.$route.params.id, this.fieldData)

            await this.$store.dispatch('toast/show', {
                title: this.$t('success'),
                icon: 'success',
                message: this.$t('fieldUpdated'),

            })

            this.$router.push({name: 'field-list'})
        },
    }
}
</script>
