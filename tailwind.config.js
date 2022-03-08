const defaultTheme = require('tailwindcss/defaultTheme');

const colors = require('tailwindcss');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'polished-pine': '#539987',
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
