import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css", // Main CSS file, include others as needed
                "resources/css/home.css", // Main CSS file, include others as needed
                "resources/css/about.css", // Main CSS file, include others as needed
                "resources/css/miscellaneous.css", // Main CSS file, include others as needed
                "resources/css/legalaid.css", // Main CSS file, include others as needed
                "resources/css/lokadalat.css", // Main CSS file, include others as needed
                "resources/css/gallery.css", // Main CSS file, include others as needed
                "resources/css/actandrules.css", // Main CSS file, include others as needed
                "resources/css/lokadalatschemes.css", // Main CSS file, include others as needed

                "resources/js/app.js", // Main JS file, include others as needed
                "resources/js/gallery.js", // Main JS file, include others as needed
            ],
            refresh: true,
        }),
    ],
    server: {
        host: "0.0.0.0", // Listen on all network interfaces
        port: 5176, // Port for the Vite dev server
        strictPort: true, // Ensures the server fails if the port is already in use
        hmr: {
            host: "localhost", // Replace with the IP of your VM
            protocol: "ws", // Use WebSocket for hot module replacement
        },
        watch: {
            usePolling: true,
        },
    },
    build: {
        assetsDir: "assets", // Directory for output assets
    },
    resolve: {
        alias: {
            "/images": "/public/images", // Add this line to create an alias for public folder images
        },
    },
});
