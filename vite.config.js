import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: '0.0.0.0',
        port: 5173,
        strictPort: true,
        hmr: {
            host: 'localhost',
            port: 5173
        }
    },
    resolve: {
        alias: {
            '@': '/resources'
        }
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css',
                'resources/css/login.css',
                'resources/css/mainscreen.css',
                // 'resources/js/login.js',
                'resources/js/app.js',
                'resources/js/sidebar.js',
                'resources/js/dashboard.js',
                'resources/js/logout.js',
                'resources/js/notification.js',
                'resources/js/notification-new.js',
                'resources/js/chart/chart1_settings.js',
                'resources/js/chart/chart2_settings.js',
                'resources/js/chart/chart3_settings.js',
                'resources/js/chart/chart4_settings.js',
            ],
            refresh: true,
        }),
    ],
});
