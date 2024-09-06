const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    darkMode: 'class',  // Enable dark mode with the 'class' strategy
    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'dark-bg': '#1a202c',  // Dark background color
                'dark-text': '#f7fafc',  // Light text color
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
};
