module.exports = {
    root: true,
    env: {
        browser: true,
        es2021: true,
        node: true,
    },
    extends: [
        'airbnb',
        '@vue/typescript/recommended',
        'plugin:vue/vue3-recommended',
        '@vue/eslint-config-prettier',
    ],
    parser: 'vue-eslint-parser',
    parserOptions: {
        parser: '@typescript-eslint/parser',
        sourceType: 'module',
        ecmaVersion: 2021,
    },
    plugins: [ 'prettier', '@typescript-eslint' ],
    rules: {
        'prettier/prettier': 'error',
        '@typescript-eslint/ban-ts-comment': 'off',
        '@typescript-eslint/no-namespace': 'off',
        'import/prefer-default-export': 'off',
        'import/extensions': [ 'error', { '.ts': 'never', '.vue': 'always' } ],
        curly: 'error',
        'no-console': process.env.NODE_ENV === 'production' ? 'error' : 'warn',
    },
    'settings': {
        'import/resolver': {
            'node': {
                'extensions': [ '.js', '.jsx', '.ts', '.tsx' ],
            },
        },
    },
    globals: {
        defineProps: 'readonly',
        defineEmits: 'readonly',
        defineExpose: 'readonly',
        withDefaults: 'readonly',
    },
};
