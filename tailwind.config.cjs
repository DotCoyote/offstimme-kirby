/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [ './site/**/*.php', './src/**/*.{html,js,ts}' ],
    corePlugins: {
        container: false,
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
    },

    plugins: [
        require('@tailwindcss/typography'),
    ],
};
