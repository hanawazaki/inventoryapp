import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'public/assets/js/argon-dashboard-tailwind.js',
                'public/assets/js/plugins/perfect-scrollbar.min.js',
                'public/assets/js/perfect-scrollbar.js',
                'public/assets/js/plugins/chartjs.min.js',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
});
