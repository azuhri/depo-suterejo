import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/assets/css/luno-style.css',
                'resources/js/app.js',
                'resources/assets/js/plugins.js',
                'resources/assets/js/theme.js'
            ],
            refresh: true,
        }),
    ],
});
