<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold m-0">
                            {{ $t('editSettings') }}
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
                                        v-if="settingsData.type==='1'"
                                        v-for="locale in $i18n.availableLocales"
                                        :key="'string-'+locale"
                                        v-model="settingsData.value[locale]"
                                        class="col-md-4"
                                        :name="'string-'+locale"
                                        type="text"
                                        :min-length="0"
                                        :max-length="255"
                                        :label="$t('value')+' '+locale.toUpperCase()"
                                    />
                                    <File
                                        v-if="settingsData.type==='2'"
                                        v-for="locale in $i18n.availableLocales"
                                        :key="'file-'+locale"
                                        :names.sync="settingsData.value[locale]"
                                        class="col-md-4"
                                        :name="'file-'+locale"
                                        type="text"
                                        :min-length="0"
                                        :max-length="255"
                                        :required="false"
                                        :label="$t('value')+' '+locale.toUpperCase()"
                                    />
                                    <RadioGroup   v-for="locale in $i18n.availableLocales"
                                                  :key="'radio-'+locale"
                                                  v-if="settingsData.type==='3'" :name="'value'"
                                                :label="$t('value')+' '+locale.toUpperCase()" class="col-md-4">
                                        <Radio :option="{value: '1', name: $t('yes')}" v-model="settingsData.value[locale]"/>
                                        <Radio :option="{value: '0', name: $t('no')}" v-model="settingsData.value[locale]"/>
                                    </RadioGroup>

                                    <Input
                                        v-if="settingsData.type==='4'"
                                        v-for="locale in $i18n.availableLocales"
                                        :key="'url-'+locale"
                                        v-model="settingsData.value[locale]"
                                        class="col-md-4"
                                        :name="'url-'+locale"
                                        type="url"
                                        :min-length="0"
                                        :max-length="255"
                                        :label="$t('value')+' '+locale.toUpperCase()"
                                    />

                                    <Textarea
                                        v-if="settingsData.type==='5'"
                                        v-for="locale in $i18n.availableLocales"
                                        :key="'url-'+locale"
                                        v-model="settingsData.value[locale]"
                                        class="col-md-12"
                                        :name="'url-'+locale"
                                        type="url"
                                        :min-length="0"
                                        :max-length="20000"
                                        :label="$t('value')+' '+locale.toUpperCase()"
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
import Textarea from '../../components/Textarea'
import Input from '../../components/Input'
import RadioGroup from '../../components/RadioGroup'
import Radio from '../../components/Radio'
import File from '../../components/File'
import http from "../../plugins/axios";

export default {
    name: 'SettingsEdit',

    components: {
        Button, Input, File, RadioGroup, Radio, Textarea
    },

    data() {
        return {
            settingsData: {
                value: {}
            }
        }
    },

    async mounted() {
        this.settingsData = (await http.get('settings/' + this.$route.params.settingsId)).data.result;
    },

    methods: {
        async save() {
            await http.put('settings/' + this.$route.params.settingsId, this.settingsData)

            await this.$store.dispatch('toast/show', {
                title: this.$t('success'),
                icon: 'success',
                message: this.$t('settingsUpdated'),

            })

            this.$router.push({name: 'settings-list'})
        },
    }
}
</script>
