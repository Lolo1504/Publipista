import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/reservas.css',
                'resources/css/admin.css',
                'resources/css/alquiler.css',
                'resources/css/auth.css',
                'resources/css/home.css',
                'resources/css/perfil.css',
                'resources/css/barra.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
