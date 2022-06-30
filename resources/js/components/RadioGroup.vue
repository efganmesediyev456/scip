<template>
    <div class="mb-4 text-start">
        <label :for="name+'Radio'" class="form-label fw-bold me-3">
            {{ label }}
            <span v-if="required" class="text-danger">*</span>
        </label>

        <div>
            <slot/>
        </div>

        <div v-if="small" :id="name+'RadioHelp'" class="form-text">
            {{ small }}
        </div>
    </div>
</template>

<script>
export default {
    name: "RadioGroup",

    props: {
        label: {
            type: String,
            required: true,
        },
        name: {
            type: String,
            required: true,
        },
        small: {
            type: String,
            default: null,
        },
        required: {
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
