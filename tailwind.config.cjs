/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [ './site/**/*.php', './src/**/*.{html,vue}' ],
    corePlugins: {
        container: true,
    },
    darkMode: 'media', // or 'class'
    theme: {
        extend: {
            colors: {
                primary: {
                    DEFAULT: '#de5e60',
                    600: '#b30000',
                },
            },
        },
        container: {
            center: true,
        },
    },

    plugins: [
        require('@tailwindcss/typography'),
    ],
};
