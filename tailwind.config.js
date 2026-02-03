import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import daisyui from 'daisyui';
import theme from 'tailwindcss/defaultTheme';
import themes from 'daisyui/theme/object';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.js'
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    darkMode: ['class', '[data-theme="dark"]'],
    plugins: [daisyui, forms],
    daisyui: {
        themes: [
            "light",    // El primero es el predeterminado
            "dark"
        ],
    },
};
