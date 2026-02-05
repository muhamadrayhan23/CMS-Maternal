import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite'; // Pastikan baris ini ada

export default defineConfig({
    plugins: [
        tailwindcss(), // Pastikan baris ini dipanggil
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],

    // server: {
    //     host: true,
    //     cors: true,
    // },
});
    // server : {
    //     host: '0.0.0.0',
    //     hmr: {
    //         host : '192.168.1.11' 
    //     },
    // },
// });
