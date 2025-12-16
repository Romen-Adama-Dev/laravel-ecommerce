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
                dielca: {
                    dark: '#0A2C51',
                    mid:  '#1E4A8B',
                    light:'#3C78D8',
                    grayText: '#4A4A4A',
                    neutralBg: '#F5F5F5',
                }
            }
        },
    },

    plugins: [forms],
};
