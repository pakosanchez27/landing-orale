import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    base: '/build/', // ⚠️ importante
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/home.css',
                'resources/css/nosotros.css',
                'resources/css/normalize.css',
                'resources/css/demos.css',
                'resources/js/app.js',
                'resources/css/blog.css',
                'resources/css/blog-post.css',
                'resources/css/faqs.css',
                'resources/css/contacto.css',
            ],
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
