import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});

// 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
// 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
