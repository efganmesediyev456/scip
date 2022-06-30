<template>
    <div class="form-check form-check-inline">
        <label class="form-check-label">
            <input class="form-check-input" type="radio"
                   :required="required"
                   :value="option.value"
                   :checked="value === option.value"
                   @change="$emit('input', option.value)"
                   :readonly="readonly"
                   :disabled="disabled"
            >
            {{ option.name }}
        </label>
    </div>
</template>

<script>

export default {
    name: "Radio",

    props: {
        required: {
            type: Boolean,
            default: true
        },
        option: {
            type: Object,
            required: true,
        },
        value: {
            type: String,
            default: null,
        },
        disabled: {
            type: Boolean,
            default: false
        },
        readonly: {
            type: Boolean,
            default: false
        }
    },
}
</script>

<style lang="scss" scoped>
label {
    font-size: 13.975px;
}
</style>
