<template>
    <div class="mb-4 text-start">
        <label :for="name+'Tag'" class="form-label fw-bold">
            {{ label }}
            <span v-if="required && label" class="text-danger">*</span>
        </label>

        <input
            :readonly="readonly"
            :disabled="disabled"
            :id="name+'Tag'"
            ref="tags"
            :value="value"
            type="text"
            :required="required"
            class="form-control tagin"
            :aria-describedby="name+'TagHelp'"
            name="tagin"
            @change="tagsAdded"
        >

        <div v-if="small" :id="name+'TagHelp'" class="form-text">
            {{ small }}
        </div>
    </div>
</template>

<script>
import Tagin from 'tagin/dist/tagin.module'

export default {
    name: "Tag",
    props: {
        label: {
            type: String,
            required: true,
        },
        small: {
            type: String,
            default: null,
        },
        value: {
            default: null,
        },
        required: {
            type: Boolean,
            default: true
        },
        name: {
            type: String,
            required: true,
        },
        disabled: {
            type: Boolean,
            default: false
        },
        readonly: {
            type: Boolean,
            default: false
        },
    },

    data() {
        return{
            tagin: null
        }
    },

    watch: {
      value(value){
          this.tagin.addTag(value)
      }
    },

    mounted() {
        this.tagin = new Tagin(this.$refs.tags, {
            separator: ',',
            placeholder: this.$t('tagPlaceholder')
        })
    },

    methods: {
        tagsAdded() {
            this.$emit('input', this.tagin.getTags())
        },
    },
}
</script>

<style lang="scss" scoped>
label {
    font-size: 13.975px;
}
</style>
