// vite.config.js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: 'localhost', // o '0.0.0.0' si estás dentro de Docker
        port: 5173,
        strictPort: true,
        hmr: {
            host: 'localhost', // asegúrate que sea el mismo host que usas para acceder al navegador
        },
    },
    plugins: [
        laravel({
           
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/merqark.css' 
            ],
            refresh: true,
        }),
    ],
});
