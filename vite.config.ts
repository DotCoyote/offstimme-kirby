import {resolve} from 'path';
import kirby from 'vite-plugin-kirby';
import {defineConfig} from 'vite';
import vuePlugin from "@vitejs/plugin-vue";

export default defineConfig(({mode}) => ({
  root: 'src',
  base: mode === 'development' ? '/' : '/dist/',

  build: {
    outDir: resolve(process.cwd(), 'public/dist'),
    emptyOutDir: true,
    rollupOptions: {input: resolve(process.cwd(), 'src/index.js')},
  },

  plugins: [kirby(), vuePlugin()],
}));
