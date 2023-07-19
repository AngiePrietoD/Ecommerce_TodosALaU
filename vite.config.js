import { defineConfig } from "vite";
import laravel, { refreshPaths } from "laravel-vite-plugin";
import path from 'path';

//const worker = new Worker(new URL("./worker.js", import.meta.url));

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
            ],
            refresh: [...refreshPaths, "app/Http/Livewire/**"],
        })
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
            '~popper.js': path.resolve(__dirname, 'node_modules/popper.js'),
            '~shepherd.js': path.resolve(__dirname, 'node_modules/shepherd.js')
        }
    }
});
