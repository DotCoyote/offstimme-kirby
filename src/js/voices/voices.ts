import { createApp } from 'vue';
import VoicesTemplate from './VoicesTemplate.vue';
import { i18n } from '../plugins/i18n';

const app = createApp(VoicesTemplate);

app.use(i18n);

app.mount('.js-voices-component');
