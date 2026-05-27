import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/app-admin.css',
                'resources/css/home.css',
                'resources/css/nosotros.css',
                'resources/css/normalize.css',
                'resources/css/demos.css',
                'resources/css/blog.css',
                'resources/css/blog-post.css',
                'resources/css/faqs.css',
                'resources/css/contacto.css',
                'resources/css/paquetes.css',
                'resources/js/app.js',
                'resources/js/app-admin.js',
                'resources/js/bootstrap.js',
                'resources/js/globales.js',
                'resources/js/vendor.js',
                'resources/js/admin/catalogos.js',
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
