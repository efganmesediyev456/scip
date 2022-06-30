<template>
    <div class="mb-4 text-start">
        <label :for="name+'FileInput'" class="form-label fw-bold">
            {{ label }}
            <span v-if="required && label" class="text-danger">*</span>



            <a class="ms-auto" v-if="!multiple && current" target="_blank" :href="current">


                {{ $t('showCurrent') }}
            </a>
        </label>

        <input
            type="file"
            :multiple="multiple"
            ref="file"
            :name="name+'FileInput'"
            :readonly="readonly"
            :disabled="disabled"
            :id="name+'FileInput'"
            :required="required"
            class="form-control"
            :aria-describedby="name+'Help'"
            @change="upload"
        >

        <div v-if="small" :id="name+'Help'" class="form-text">{{ small }}</div>
    </div>
</template>

<script>
import http from "../plugins/axios";

export default {
    name: "File",
    props: {
        label: {
            type: String,
            required: false,
        },
        small: {
            type: String,
            default: null,
        },
        required: {
            type: Boolean,
            default: true
        },
        multiple: {
            type: Boolean,
            default: false
        },
        name: {
            type: String,
            required: false,
        },
        disabled: {
            type: Boolean,
            default: false
        },
        readonly: {
            type: Boolean,
            default: false
        },
        current: {
            type: String | Array,
            default: null
        },
    },

    methods: {
        async upload() {
            const formData = new FormData()

            for (let i = 0; i < this.$refs.file.files.length; i++) {
                formData.append('files[]', this.$refs.file.files[i]);
            }

            formData.append('type', 'private')

            const response = await http.post('file-manager/upload', formData)

            const names = response.data.result.names

            this.$emit('update:files', this.multiple ? this.$refs.file.files : this.$refs.file.files[0])
            this.$emit('update:names', this.multiple ? names : names[0])
        }
    }
}
</script>
