<script lang="ts" setup>
import { defineAsyncComponent, onMounted, ref } from 'vue';
import { Voice } from './typings/voice.types';
import FilterForm from './FilterForm.vue';
import { SelectedFilters } from './typings/filterForm.types';

const VoiceActor = defineAsyncComponent(() => import('./VoiceActor.vue'));

const voices = ref<Voice.BASE[]>();

interface PostParams {
  search?: string;
  filterBy?: unknown[];
}

async function requestVoices(selectedFilters?: SelectedFilters) {
  try {
    const postParams: PostParams = {
      search: selectedFilters?.searchText || '',
      filterBy: [],
    };

    if (selectedFilters?.voiceAge && postParams.filterBy) {
      postParams.filterBy.push({
        field: 'voiceAge',
        value: [selectedFilters.voiceAge],
        operator: 'in',
      });
    }
    if (selectedFilters?.voiceStyle && postParams.filterBy) {
      postParams.filterBy.push({
        field: 'voiceStyle',
        value: [selectedFilters.voiceStyle],
        operator: 'in',
      });
    }

    const response = await fetch('/api/pages/voices/children/search?select=content,files', {
      method: 'POST',
      body: JSON.stringify(postParams),
      headers: {
        'X-CSRF': window.csrf,
        'X-Language': 'en_US',
      },
    });
    const responseJson = await response.json();
    voices.value = responseJson.data as Voice.BASE[];
  } catch (e) {
    console.error(e);
  }
}

onMounted(() => {
  requestVoices();
});
</script>

<template>
  <div class="container px-4">
    <filter-form @form-submit="requestVoices" />
    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
      <voice-actor v-for="voice in voices" :key="voice.content.uuid" :actor="voice" />
    </div>
  </div>
</template>

<style scoped lang="scss"></style>
