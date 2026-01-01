import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
    server: {
        host: "0.0.0.0", // Listen on all network interfaces
        port: 5175, // Port for the Vite dev server
        strictPort: true, // Ensures the server fails if the port is already in use
        hmr: {
            host: "localhost", // Use the VirtualBox IP instead of localhost
            protocol: "ws", // Use WebSocket for hot module replacement
        },
        watch: {
            usePolling: true,
        },
    },
});
