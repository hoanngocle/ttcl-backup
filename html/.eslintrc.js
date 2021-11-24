module.exports = {
  root: true,
  env: {
    node: true,
  },
  extends: ['plugin:vue/recommended', '@vue/airbnb'],
  parserOptions: {
    parser: 'babel-eslint',
  },
  rules: {
    'no-console': process.env.NODE_ENV === 'production' ? 'error' : 'off',
    'no-debugger': process.env.NODE_ENV === 'production' ? 'error' : 'off',

    semi: ['error', 'always'],
    eqeqeq: ["error", "always"],
    'max-len': 'off',
    'linebreak-style': 'off',
    // camelcase: ['error', { properties: 'never', ignoreDestructuring: true, ignoreImports: true }],
    'arrow-parens': ['error', 'always'],
    'object-curly-newline': 'off',
    'vue/multiline-html-element-content-newline': 'off',
    'vue/max-attributes-per-line': [
      2,
      {
        singleline: 40,
        multiline: {
          max: 1,
          allowFirstLine: false,
        },
      },
    ],
  },
};
