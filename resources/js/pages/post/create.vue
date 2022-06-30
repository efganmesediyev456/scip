<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold m-0">
                            {{ $t('createNewPost') }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <div v-if="!fields.length" class="text-input__loading">
                            <div v-for="n in 3" :key="n" class="text-input__loading--line"/>
                        </div>
                        <form
                            v-else
                            class="w-100 d-flex"
                            @submit.prevent="save"
                        >
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12"
                                         v-for="field in fields.filter((f)=>f.type === '1' && f.translated === '1')"
                                         :key="'field-'+field.id">
                                        <div class="row">
                                            <Input
                                                v-for="locale in $i18n.availableLocales"
                                                :key="'field-'+field.id+''+locale"
                                                v-model="postData.fields[field.identifier][locale]"
                                                class="col-md-4"
                                                :name="field.identifier"
                                                :min="field.min"
                                                :max="field.max"
                                                :min-length="field.min_length"
                                                :max-length="field.max_length"
                                                :label="field.name+' '+(locale.toUpperCase())"
                                                :required="field.required === '1'"
                                                :placeholder="field.placeholder"
                                            />
                                        </div>
                                    </div>

                                    <div class="col-md-12"
                                         v-for="field in fields.filter((f)=>f.type === '5' && f.translated === '1')"
                                         :key="'field-'+field.id">
                                        <div class="row">
                                            <Textarea
                                                v-for="locale in $i18n.availableLocales"
                                                :key="'field-'+field.id+''+locale"
                                                v-model="postData.fields[field.identifier][locale]"
                                                class="col-md-12"
                                                :name="field.identifier"
                                                :min-length="field.min_length"
                                                :max-length="field.max_length"
                                                :label="field.name+' '+(locale.toUpperCase())"
                                                :required="field.required === '1'"
                                                :placeholder="field.placeholder"
                                            />
                                        </div>
                                    </div>

                                    <div class="col-md-12"
                                         v-for="field in fields.filter((f)=>f.type === '4' && f.translated === '1')"
                                         :key="'field-'+field.id">
                                        <div class="row">
                                            <Editor v-for="locale in $i18n.availableLocales"
                                                    v-model="postData.fields[field.identifier][locale]"
                                                    :label="field.name+' '+(locale.toUpperCase())"
                                                    :key="'field-'+field.id+''+locale"/>
                                        </div>
                                    </div>

                                    <div class="col-md-12"
                                         v-for="field in fields.filter((f)=>f.type === '4' && f.translated === '0')"
                                         :key="'field-'+field.id">
                                        <div class="row">
                                            <Editor v-model="postData.fields[field.identifier]" :label="field.name"/>
                                        </div>
                                    </div>

                                    <Input
                                        v-for="field in fields.filter(((f)=>f.type === '2' && f.translated === '0'))"
                                        :key="'field-'+field.id"
                                        v-model="postData.fields[field.identifier]"
                                        class="col-md-4"
                                        :name="field.identifier"
                                        type="number"
                                        :min="field.min"
                                        :max="field.max"
                                        :min-length="field.min_length"
                                        :max-length="field.max_length"
                                        :label="field.name"
                                        :required="field.required === '1'"
                                        :placeholder="field.placeholder"
                                    />

                                    <Input
                                        v-for="field in fields.filter(((f)=>f.type === '9' && f.translated === '0'))"
                                        :key="'field-'+field.id"
                                        v-model="postData.fields[field.identifier]"
                                        class="col-md-4"
                                        :name="field.identifier"
                                        type="date"
                                        :min="field.min"
                                        :max="field.max"
                                        :min-length="field.min_length"
                                        :max-length="field.max_length"
                                        :label="field.name"
                                        :required="field.required === '1'"
                                        :placeholder="field.placeholder"
                                    />

                                    <Textarea
                                        v-for="field in fields.filter(((f)=>f.type === '5' && f.translated === '0'))"
                                        :key="'field-'+field.id"
                                        v-model="postData.fields[field.identifier]"
                                        class="col-md-12"
                                        :name="field.identifier"
                                        type="text"
                                        :min-length="field.min_length"
                                        :max-length="field.max_length"
                                        :label="field.name"
                                        :required="field.required === '1'"
                                        :placeholder="field.placeholder"
                                    />

                                    <Input
                                        v-for="field in fields.filter(((f)=>['13','14'].includes(f.type) && f.translated === '0'))"
                                        :key="'field-'+field.id"
                                        v-model="postData.fields[field.identifier]"
                                        class="col-md-4"
                                        :name="field.identifier"
                                        type="url"
                                        :min="field.min"
                                        :max="field.max"
                                        :min-length="field.min_length"
                                        :max-length="field.max_length"
                                        :label="field.name"
                                        :required="field.required === '1'"
                                        :placeholder="field.placeholder"
                                    />

                                    <Select
                                        v-for="field in fields.filter(((f)=>f.type === '6' && f.translated === '0'))"
                                        :key="'field-'+field.id"
                                        :name="field.identifier"
                                        v-model="postData.fields[field.identifier]"
                                        class="col-md-4"
                                        :options="field.field_values"
                                        :label="field.name"
                                    />

                                    <Select
                                        v-for="field in fields.filter(((f)=>f.type === '7' && f.translated === '0'))"
                                        :key="'field-'+field.id"
                                        :name="field.identifier"
                                        :multiple="true"
                                        v-model="postData.fields[field.identifier]"
                                        class="col-md-4"
                                        :options="field.field_values"
                                        :label="field.name"
                                    />

                                    <Input
                                        v-for="field in fields.filter(((f)=>f.type === '1' && f.translated === '0'))"
                                        :key="'field-'+field.id"
                                        v-model="postData.fields[field.identifier]"
                                        class="col-md-4"
                                        :name="field.identifier"
                                        type="text"
                                        :min="field.min"
                                        :max="field.max"
                                        :min-length="field.min_length"
                                        :max-length="field.max_length"
                                        :label="field.name"
                                        :required="field.required === '1'"
                                        :placeholder="field.placeholder"
                                    />

                                    <File
                                        v-for="field in fields.filter(((f)=>f.type==='11' && f.translated === '0'))"
                                        :key="'field-'+field.id"
                                        :names.sync="postData.fields[field.identifier]"
                                        class="col-md-4"
                                        :name="field.identifier"
                                        type="file"
                                        :min="field.min"
                                        :max="field.max"
                                        :min-length="field.min_length"
                                        :max-length="field.max_length"
                                        :label="field.name"
                                        :required="field.required === '1'"
                                        :placeholder="field.placeholder"
                                    />

                                    <File
                                        v-for="field in fields.filter(((f)=>f.type==='12' && f.translated === '0'))"
                                        :key="'field-'+field.id"
                                        :names.sync="postData.fields[field.identifier]"
                                        class="col-md-4"
                                        :name="field.identifier"
                                        type="file"
                                        :multiple="true"
                                        :min="field.min"
                                        :max="field.max"
                                        :min-length="field.min_length"
                                        :max-length="field.max_length"
                                        :label="field.name"
                                        :required="field.required === '1'"
                                        :placeholder="field.placeholder"
                                    />

                                    <RadioGroup :name="field.identifier" options="" :label="field.name" class="col-md-4"
                                                v-for="field in fields.filter((f)=>f.type==='3')"
                                                :key="'field-'+field.id"
                                    >
                                        <Radio v-for="option in field.field_values" :key="'field-value-'+option.value"
                                               :option="option"
                                               :required="field.required === '1'"
                                               v-model="postData.fields[field.identifier]"
                                        />
                                    </RadioGroup>
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

        <div class="row mt-3" v-if="!this.$route.query.page_id">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold m-0">
                            {{ $t('seo') }}
                        </h5>
                    </div>
                    <div class="card-body">

                        <div class="col-md-12">
                            <div class="row">
                                <Input
                                    v-for="locale in $i18n.availableLocales"
                                    :key="'seo-title-'+locale"
                                    v-model="postData.seo.title[locale]"
                                    class="col-md-4"
                                    :name="'seo-title-'+locale"
                                    :required="false"
                                    :label="$t('seoTitle')+' '+locale.toUpperCase()"
                                />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <Input
                                    v-for="locale in $i18n.availableLocales"
                                    :key="'seo-url-'+locale"
                                    v-model="postData.seo.url[locale]"
                                    class="col-md-4"
                                    :name="'seo-url-'+locale"
                                    :required="false"
                                    :label="$t('seoUrl')+' '+locale.toUpperCase()"
                                />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <File
                                    v-for="locale in $i18n.availableLocales"
                                    :key="'seo-image-'+locale"
                                    :names.sync="postData.seo.image[locale]"
                                    class="col-md-4"
                                    :name="'seo-image-'+locale"
                                    :required="false"
                                    :label="$t('seoImage')+' '+locale.toUpperCase()"
                                />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <Textarea
                                    v-for="locale in $i18n.availableLocales"
                                    :key="'seo-description-'+locale"
                                    v-model="postData.seo.description[locale]"
                                    class="col-md-12"
                                    :name="'seo-description-'+locale"
                                    :label="$t('seoDescription')+' '+locale.toUpperCase()"
                                    :required="false"
                                />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <Tag
                                    v-for="locale in $i18n.availableLocales"
                                    :key="'seo-keywords-'+locale"
                                    v-model="postData.seo.keywords[locale]"
                                    class="col-md-12"
                                    :name="'seo-keywords-'+locale"
                                    :required="false"
                                    :label="$t('seoKeywords')+' '+locale.toUpperCase()"
                                />
                            </div>
                        </div>
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
import Radio from '../../components/Radio'
import RadioGroup from '../../components/RadioGroup'
import Textarea from '../../components/Textarea'
import Editor from '../../components/Editor'
import File from '../../components/File'
import Tag from '../../components/Tag'
import http from "../../plugins/axios";

export default {
    name: 'PostCreate',

    components: {
        Button, Input, Select, Radio, Textarea, Editor, File, Tag, RadioGroup
    },

    data() {
        return {
            fields: [],
            postData: {
                fields: {},
                seo: {
                    title: {},
                    description: {},
                    keywords: {},
                    image: {},
                    url: {}
                }
            },
        }
    },

    async mounted() {
        this.fields = (await http.get('posts/' + this.$route.params.postType + '/fields')).data.result

        for (const field in this.fields) {
            if (this.fields[field].translated === '1') {
                this.postData.fields[this.fields[field].identifier] = {}
            }
        }

        console.log(this.fields);
    },

    methods: {
        async save() {
            await http.post('posts/' + this.$route.params.postType, {
                ...this.postData,
                page_id: this.$route.query.page_id
            })

            await this.$store.dispatch('toast/show', {
                title: this.$t('success'),
                icon: 'success',
                message: this.$t('postCreated'),

            })

            if(this.$route.query.page_id){
                this.$router.push({name: 'pages'})
            }else{
                this.$router.push({name: 'post-list'})
            }
        }
    }
}
</script>
