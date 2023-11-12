// vite.config.js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { resolve } from 'path'; // Add this line to import the path module

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: true,
    }),
  ],
  server: {
    watch: {
      // Exclude unnecessary directories from being watched
      // Replace './node_modules' and './vendor' with the directories you want to exclude
      ignored: [resolve(__dirname, './node_modules'), resolve(__dirname, './vendor')]
    }
  }
});
 