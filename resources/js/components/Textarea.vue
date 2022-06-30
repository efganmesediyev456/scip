<template>
    <div class="mb-4 text-start">
        <label :for="name+'Textarea'" class="form-label fw-bold">
            {{ label }}
            <span v-if="required && label" class="text-danger">*</span>
        </label>

        <textarea
            :readonly="readonly"
            :disabled="disabled"
            :id="name+'Textarea'"
            ref="textarea"
            :required="required"
            class="form-control"
            :value="value"
            :autocomplete="autocomplete"
            :aria-describedby="name+'TextareaHelp'"
            :placeholder="placeholder"
            :minlength="minLength"
            :maxlength="maxLength"
            @input="$emit('input', $event.target.value)"
        >{{ value }}</textarea>

        <div v-if="small" :id="name+'TextareaHelp'" class="form-text">{{ small }}</div>
    </div>
</template>

<script>

export default {
    name: "Textarea",
    props: {
        label: {
            type: String,
            required: true,
        },
        small: {
            type: String,
            default: null,
        },
        type: {
            type: String,
            default: 'text'
        },
        required: {
            type: Boolean,
            default: true
        },
        name: {
            type: String,
            required: true,
        },
        autocomplete: {
            type: String,
            default: null,
        },
        value: {
            default: null
        },
        placeholder: {
            type: String,
            default: null
        },
        min: {
            type: String,
            default: null
        },
        max: {
            type: String,
            default: null
        },
        minLength: {
            type: String | Number,
            default: null
        },
        maxLength: {
            type: String | Number,
            default: null
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

    methods: {
        input() {
            this.$emit('update:value', this.$refs.textarea.value)
        },
    },
}
</script>

<style lang="scss" scoped>
label {
    font-size: 13.975px;
}
</style>
