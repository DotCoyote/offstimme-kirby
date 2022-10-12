import { createApp } from 'vue';
import { i18n } from '../plugins/i18n';
import VoiceActorQuickSearch from './VoiceActorQuickSearch.vue';

const app = createApp({});

app.use(i18n);

app.component('VoiceActorQuickSearch', VoiceActorQuickSearch);

app.mount('.js-voice-quick-search');
