/* eslint-disable import/no-extraneous-dependencies */
// @ts-ignore
import path, { resolve } from 'path';
import kirby from 'vite-plugin-kirby';
import { defineConfig } from 'vite';
import vuePlugin from '@vitejs/plugin-vue';
import { createSvgIconsPlugin } from 'vite-plugin-svg-icons';
import vueI18n from '@intlify/vite-plugin-vue-i18n';

export default defineConfig(({ mode }) => ({
  root: 'src',
  base: mode === 'development' ? '/' : '/dist/',

  build: {
    outDir: resolve(process.cwd(), 'public/dist'),
    emptyOutDir: true,
    rollupOptions: { input: resolve(process.cwd(), 'src/index.js') },
  },
  resolve: { alias: { vue: 'vue/dist/vue.esm-bundler.js' } },
  plugins: [
    createSvgIconsPlugin({
      // Specify the icon folder to be cached
      iconDirs: [path.resolve(process.cwd(), 'src/assets/icons')],
      // Specify symbolId format
      symbolId: 'icon-[name]',
    }),
    kirby(),
    vuePlugin(),

    vueI18n({
      // if you want to use Vue I18n Legacy API, you need to set `compositionOnly: false`
      include: path.resolve(__dirname, './src/locales/**'),
      compositionOnly: false,
    }),
  ],
}));
