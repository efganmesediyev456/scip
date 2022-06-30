module.exports = {
    extends: [
        // add more generic rulesets here, such as:
        // 'eslint:recommended',
        'plugin:vue/vue3-recommended',
        // 'plugin:vue/recommended' // Use this if you are using Vue.js 2.x.
    ],
    rules: {
        'vue/multi-word-component-names': 0,
        'vue/no-deprecated-v-bind-sync': 0,
        'vue/no-deprecated-v-on-native-modifier': 0,
        'vue/no-v-html': 0
    }
}
