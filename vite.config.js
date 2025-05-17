import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: 'complaint-system',              // 👈 your virtual host name
        port: 5173,
        origin: 'http://complaint-system:5173', // 👈 critical for correct CORS
        strictPort: true,
        hmr: {
            protocol: 'ws',
            host: 'complaint-system',
            port: 5173,
        },
    },
    plugins: [
        laravel([
            'resources/css/app.css',
            'resources/js/app.js',
        ]),
    ],
});
