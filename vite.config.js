import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import inputs from './vite.inputs.js';

export default defineConfig({
    server: {
        host: process.env.VITE_HOST || '0.0.0.0',
        port: Number(process.env.VITE_PORT) || 3000,
        hmr: {
            host: process.env.VITE_APP_NAME || 'minecraft-sandbox.loc',
            protocol: 'ws',
            clientPort: 3000
        },
    },
    plugins: [
        laravel({
            input: inputs,
            refresh: true,
        }),
        tailwindcss(),
    ],
});
