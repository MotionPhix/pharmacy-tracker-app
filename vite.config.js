import path from 'path'
import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'

export default defineConfig({
  resolve: {
    alias: {
      '~': path.resolve(__dirname, './resources/js'),
      '@': path.resolve(__dirname, './resources'),
      // '~': fileURLToPath(new URL('./resources/views', import.meta.url)),
    },
  },

  plugins: [
    laravel({
      input: 'resources/js/app.js',
      ssr: 'resources/js/ssr.js',
      refresh: true,
    }),
    vue({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false,
        },
      },
    }),
  ],
  ssr: {
    noExternal: ['vue', '@protonemedia/laravel-splade'],
  },
})
