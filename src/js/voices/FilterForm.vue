<script lang="ts" setup>
import {reactive, watch} from 'vue';
import {SelectedFilters} from './typings/filterForm.types';

const $emit = defineEmits<{
  (e: 'update:modelValue', data: SelectedFilters): void;
  (e: 'form-submit', data: void): void;
}>();

const selectedFilters = reactive<SelectedFilters>({
  voiceAge: null,
  voiceStyle: null,
  gender: null,
  language: null,
  searchText: '',
});

const voiceAgeOptions = [
  {
    label: 'Adult',
    value: 'adult',
  },
  {
    label: 'Mature',
    value: 'mature',
  },
  {
    label: 'Young Adult',
    value: 'youngAdult',
  },
];

const voiceStyleOptions = [
  {
    label: 'Deep',
    value: 'deep',
  },
  {
    label: 'Middle',
    value: 'middle',
  },
  {
    label: 'Light',
    value: 'light',
  },
];

const genderOptions = [
  {
    label: 'Female',
    value: 'female',
  },
  {
    label: 'Male',
    value: 'male',
  },
  {
    label: 'Diverse',
    value: 'diverse',
  },
];

const languageOptions = [];

watch(
  () => selectedFilters,
  (newVal) => {
    $emit('update:modelValue', newVal);
  },
  {
    deep: true,
  },
);
</script>

<template>
  <form action="" class="mt-4 grid lg:grid-cols-2 gap-4 max-w-[40rem] mx-auto" @submit.prevent="$emit('form-submit')">
    <h2 class="col-span-2">Have a look at our database</h2>

    <div>
      <label class="block uppercase tracking-wide text-gray-200 text-xs font-bold mb-2" for="search-name">
        Name
      </label>
      <input
        v-model="selectedFilters.searchText"
        class="shadow appearance-none border w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        id="search-name"
        type="text"
        placeholder="Name"
      />
    </div>
    <div></div>

    <div>
      <label class="block uppercase tracking-wide text-gray-200 text-xs font-bold mb-2" for="search-language">
        Language
      </label>
      <div class="relative">
        <select v-model="selectedFilters.language"
                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="search-language">
          <option :value="null" :selected="selectedFilters.language === null">-</option>
          <option
            v-for="language in languageOptions"
            :key="language.value"
            :value="language.value"
            :selected="selectedFilters.language === language.value"
          >
            {{ language.label }}
          </option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
          </svg>
        </div>
      </div>
    </div>

    <div>
      <label class="block uppercase tracking-wide text-gray-200 text-xs font-bold mb-2" for="search-gender">
        Gender
      </label>
      <div class="relative">
        <select v-model="selectedFilters.gender"
                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="search-gender">
          <option :value="null" :selected="selectedFilters.gender === null">-</option>
          <option
            v-for="gender in genderOptions"
            :key="gender.value"
            :value="gender.value"
            :selected="selectedFilters.gender === gender.value"
          >
            {{ gender.label }}
          </option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
          </svg>
        </div>
      </div>
    </div>

    <div>
      <label class="block uppercase tracking-wide text-gray-200 text-xs font-bold mb-2" for="search-voice-age">
        Voice Age
      </label>
      <div class="relative">
        <select v-model="selectedFilters.voiceAge"
                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="search-voice-age">
          <option :value="null" :selected="selectedFilters.voiceAge === null">-</option>
          <option
            v-for="voiceAge in voiceAgeOptions"
            :key="voiceAge.value"
            :value="voiceAge.value"
            :selected="selectedFilters.voiceAge === voiceAge.value"
          >
            {{ voiceAge.label }}
          </option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
          </svg>
        </div>
      </div>
    </div>

    <div>
      <label class="block uppercase tracking-wide text-gray-200 text-xs font-bold mb-2" for="search-voice-style">
        Voice Style
      </label>
      <div class="relative">
        <select v-model="selectedFilters.voiceStyle"
                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="search-voice-style">
          <option :value="null" :selected="selectedFilters.voiceStyle === null">-</option>
          <option
            v-for="voiceStyle in voiceStyleOptions"
            :key="voiceStyle.value"
            :value="voiceStyle.value"
            :selected="selectedFilters.voiceStyle === voiceStyle.value"
          >
            {{ voiceStyle.label }}
          </option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
          </svg>
        </div>
      </div>
    </div>

    <div></div>
    <div class="flex flex-row-reverse">
      <button type="submit" class="btn btn--primary">Submit</button>
    </div>
  </form>
</template>

<style scoped lang="scss"></style>
