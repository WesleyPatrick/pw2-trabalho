import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                aqua: {
                    light: '#7fdbff',
                    DEFAULT: '#39cccc',
                    dark: '#007c91',
                },
                blue: {
                    light: '#85d7ff',
                    DEFAULT: '#1fb6ff',
                    dark: '#009eeb',
                },
                teal: {
                    light: '#64ffda',
                    DEFAULT: '#1de9b6',
                    dark: '#00bfae',
                },
            },
        },
    },

    plugins: [forms],
};
