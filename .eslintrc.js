module.exports = {
    env: {
        browser: true,
        es2020: true,
    },
    extends: [
        'airbnb',
        'plugin:react/recommended',
        'plugin:prettier/recommended',
    ],
    globals: {
        config: 'readonly',
    },
    parserOptions: {
        ecmaFeatures: {
            jsx: true,
        },
        ecmaVersion: 11,
        sourceType: 'module',
    },
    plugins: ['react'],
    rules: {
        'import/prefer-default-export': 'off',
        'no-unused-expressions': 'off',
        'react/prop-types': 'off',
        'react/jsx-indent': ['warn', 4],
        'react/jsx-indent-props': ['warn', 4],
        'react/jsx-one-expression-per-line': 'off',
        'react/jsx-curly-newline': 'off',
        'react/display-name': 'off',
        'react/jsx-props-no-spreading': 'off',
        'react/jsx-wrap-multilines': 'off',
        'react/destructuring-assignment': 'off',
        'react/jsx-filename-extension': [1, { extensions: ['.js'] }],
    },
    settings: {
        'import/resolver': {
            node: {},
            webpack: {},
        },
    },
};
