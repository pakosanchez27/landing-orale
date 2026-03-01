import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    base: '/public/build/',
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/css/home.css', 'resources/css/nosotros.css', 'resources/js/app.js', 'resources/css/normalize.css'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
