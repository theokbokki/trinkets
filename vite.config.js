import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { run } from 'vite-plugin-run'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        run([
            {
                name: 'compile views',
                run: ['php', 'artisan', 'blade-sfc:compile'],
                condition: (file) => file.includes('.blade.php'),
            },
        ]),
    ]
});
