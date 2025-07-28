// tailwind.config.js
import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    // Asegúrate de incluir index.blade.php y todos los blade en resources/views
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/index.blade.php', // Añadido específicamente
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
          
             colors: {
                 'merqark-orange': {
                    500: '#FF8C00',
                 600: '#FFA500',
                 700: '#FF4500',
                }
             }
        },
    },

    plugins: [forms],
};
