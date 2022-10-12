<script lang="ts" setup>
import { useI18n } from 'vue-i18n';
import { onMounted } from 'vue';
import { languageOptions, useVoiceFilterOptions } from '../shared/composables/useVoiceFilterOptions';

const { genderOptions, selectedFilters, mapUrlParams } = useVoiceFilterOptions();
const { t } = useI18n();
const formUrl = window.voiceActorsUrl;

onMounted(() => {
  mapUrlParams();
});
</script>

<template>
  <form :action="formUrl" method="get">
    <div class="flex flex-row gap-4">
      <div class="relative">
        <select
          id="search-gender"
          v-model="selectedFilters.gender"
          class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
          name="voiceGender"
        >
          <option :selected="selectedFilters.gender === null" :value="null">-</option>
          <option
            v-for="gender in genderOptions"
            :key="gender.value"
            :selected="selectedFilters.gender === gender.value"
            :value="gender.value"
          >
            {{ gender.label }}
          </option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg class="fill-current h-4 w-4" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
          </svg>
        </div>
      </div>

      <div class="relative">
        <select
          id="search-language"
          v-model="selectedFilters.language"
          class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
          name="voiceLanguage"
        >
          <option :selected="selectedFilters.language === null" :value="null">-</option>
          <option
            v-for="language in languageOptions"
            :key="language.id"
            :selected="selectedFilters.language === language.id"
            :value="language.id"
          >
            {{ language.title }}
          </option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg class="fill-current h-4 w-4" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
          </svg>
        </div>
      </div>

      <button class="btn btn--primary" type="submit">
        {{ t('voiceActors.submit') }}
      </button>
    </div>
  </form>
</template>
