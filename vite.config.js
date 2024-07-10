import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 
                'resources/css/login.css',
                'resources/css/mainscreen.css',
                'resources/js/login.js',
                'resources/js/app.js', 
                'resources/sidebar.js', 
                'resources/dashboard.js', 
                'resources/logout.js',
                'resources/notification.js',
                'resources/js/chart/chart1_settings.js',
                'resources/js/chart/chart2_settings.js',
                'resources/js/chart/chart3_settings.js',
                'resources/js/chart/chart4_settings.js',
            ],
            refresh: true,
        }),
    ],
});
