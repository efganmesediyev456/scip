<template>
    <div class="mb-4 text-start">
        <label :for="name+'Input'" class="form-label fw-bold">
            {{ label }} <span v-if="label && required" class="text-danger">*</span>
        </label>

        <input
            :readonly="readonly"
            :disabled="disabled"
            :id="name+'Input'"
            :type="type"
            :min="min"
            :value="value"
            :max="max"
            :required="required"
            class="form-control"
            :autocomplete="autocomplete"
            :aria-describedby="name+'Help'"
            :placeholder="placeholder"
            :min-length="minLength"
            :max-length="maxLength"
            @input="$emit('input', $event.target.value)"
        >

        <div v-if="small" :id="name+'Help'" class="form-text">
            {{ small }}
        </div>
    </div>
</template>

<script>

export default {
    name: "Input",
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
            type: String | Number,
            default: null
        },
        max: {
            type: String | Number,
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
}
</script>

<style lang="scss" scoped>
label {
    font-size: 13.975px;
}
</style>
