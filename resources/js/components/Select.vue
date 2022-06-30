<template>
    <div class="mb-4 text-start">
        <label :for="name+'Select'" class="form-label fw-bold">
            {{ label }}
            <span v-if="required" class="text-danger">*</span>
        </label>

        <select
            :readonly="readonly"
            :disabled="disabled"
            :id="name+'Select'"
            ref="select"
            :required="required"
            :value="value"
            @change="update"
            :aria-describedby="name+'SelectHelp'"
            :multiple="multiple"
            class="form-select ">
            <option :value="null" disabled>Select an option</option>
            <option v-for="option in options" :value="option.value">
                {{ option.name }}
            </option>
        </select>

        <div
            v-if="small"
            :id="name+'SelectHelp'"
            class="form-text"
        >
            {{ small }}
        </div>
    </div>
</template>

<script>

export default {
    name: "Select",

    props: {
        label: {
            required: true,
        },
        options: {
            required: true,
        },
        small: {
            default: null,
        },
        required: {
            default: true
        },
        multiple: {
            default: false
        },
        name: {
            required: true,
        },
        value: {
            default: null
        },
        disabled: {
            default: false
        },
        readonly: {
            default: false
        }
    },

    methods: {
        update() {
            let selected = [...this.$refs.select.selectedOptions].map(option => option.value);

            this.$emit('input', this.multiple ? selected : selected[0])
        },
    },
}
</script>

<style lang="scss" scoped>
label {
    font-size: 13.975px;
}
</style>
