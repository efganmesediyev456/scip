<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold m-0">
                            {{ $t('createNewPage') }}
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
                                        name="pageType"
                                        v-model="pageType"
                                        class="col-md-4"
                                        :options="$store.getters['page/types']"
                                        :label="$t('pageType')"
                                    />

                                    <Input
                                        v-for="locale in $i18n.availableLocales"
                                        :key="'page-name-'+locale"
                                        v-model="pageData.name[locale]"
                                        class="col-md-4"
                                        :name="'name-'+locale"
                                        :min-length="0"
                                        :max-length="220"
                                        :label="$t('name')+' '+(locale.toUpperCase())"
                                        :required="false"
                                    />

                                    <Select
                                        v-if="pages.length"
                                        name="parentPage"
                                        v-model="pageData.parent_id"
                                        class="col-md-4"
                                        :options="pages"
                                        :label="$t('parentPage')"
                                    />

                                    <RadioGroup :name="'page-shown-in-menu'" :label="$t('shown_in_menu')"
                                                class="col-md-4">
                                        <Radio :option="{value: '1', name: $t('yes')}"
                                               v-model="pageData.shown_in_menu"
                                        />
                                        <Radio :option="{value: '0', name: $t('no')}"
                                               v-model="pageData.shown_in_menu"
                                        />
                                    </RadioGroup>

                                    <div class="col-md-12"
                                         v-for="field in fields.filter((f)=>f.type === '1' && f.translated === '1')"
                                         :key="'field-'+field.id">
                                        <div class="row">
                                            <Input
                                                v-for="locale in $i18n.availableLocales"
                                                :key="'field-'+field.id+''+locale"
                                                v-model="pageData.fields[field.identifier][locale]"
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
                                                v-model="pageData.fields[field.identifier][locale]"
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
                                                    v-model="pageData.fields[field.identifier][locale]"
                                                    :label="field.name+' '+(locale.toUpperCase())"
                                                    :key="'field-'+field.id+''+locale"/>
                                        </div>
                                    </div>

                                    <div class="col-md-12"
                                         v-for="field in fields.filter((f)=>f.type === '4' && f.translated === '0')"
                                         :key="'field-'+field.id">
                                        <div class="row">
                                            <Editor v-model="pageData.fields[field.identifier]" :label="field.name"/>
                                        </div>
                                    </div>

                                    <Input
                                        v-for="field in fields.filter(((f)=>f.type === '2' && f.translated === '0'))"
                                        :key="'field-'+field.id"
                                        v-model="pageData.fields[field.identifier]"
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
                                        v-model="pageData.fields[field.identifier]"
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
                                        v-model="pageData.fields[field.identifier]"
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
                                        v-model="pageData.fields[field.identifier]"
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
                                        v-model="pageData.fields[field.identifier]"
                                        class="col-md-4"
                                        :options="field.field_values"
                                        :label="field.name"
                                    />

                                    <Select
                                        v-for="field in fields.filter(((f)=>f.type === '7' && f.translated === '0'))"
                                        :key="'field-'+field.id"
                                        :name="field.identifier"
                                        :multiple="true"
                                        v-model="pageData.fields[field.identifier]"
                                        class="col-md-4"
                                        :options="field.field_values"
                                        :label="field.name"
                                    />

                                    <Input
                                        v-for="field in fields.filter(((f)=>f.type === '1' && f.translated === '0'))"
                                        :key="'field-'+field.id"
                                        v-model="pageData.fields[field.identifier]"
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
                                        :names.sync="pageData.fields[field.identifier]"
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
                                        :names.sync="pageData.fields[field.identifier]"
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
                                               v-model="pageData.fields[field.identifier]"
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

        <div class="row mt-3">
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
                                    v-model="pageData.seo.title[locale]"
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
                                    v-model="pageData.seo.url[locale]"
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
                                    :names.sync="pageData.seo.image[locale]"
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
                                    v-model="pageData.seo.description[locale]"
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
                                    v-model="pageData.seo.keywords[locale]"
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
    name: 'PageCreate',

    components: {
        Button, Input, Select, Radio, Textarea, Editor, File, Tag, RadioGroup
    },

    data() {
        return {
            pages: [],
            fields: [],
            pageType: null,
            pageData: {
                name: {},
                parent_id: null,
                shown_in_menu: null,
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

    watch: {
        async pageType(type) {
            this.fields = (await http.get('pages/' + type + '/fields')).data.result
            console.log(this.fields);
            for (const field in this.fields) {
                if (this.fields[field].translated === '1') {
                    this.pageData.fields[this.fields[field].identifier] = {}
                }
            }
        }
    },

    async mounted() {
        this.pages = (await http.get('pages')).data.result.map((page) => {
            return {
                value: page.id,
                name: page.name
            }
        })
    },

    methods: {
        async save() {
            await http.post('pages/' + this.pageType, this.pageData)

            await this.$store.dispatch('toast/show', {
                title: this.$t('success'),
                icon: 'success',
                message: this.$t('pageCreated'),

            })

            this.$router.push({name: 'pages'})
        }
    }
}
</script>
