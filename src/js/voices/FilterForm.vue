<script lang="ts" setup>
import { reactive, watch } from 'vue';
import { SelectedFilters } from './typings/filterForm.types';
import { Language } from './typings/language.types';

const $emit = defineEmits<{
  (e: 'update:modelValue', data: SelectedFilters): void;
  (e: 'form-submit', data: void): void;
}>();

const props = defineProps<{
  languages: Language[];
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
      <label class="block uppercase tracking-wide text-gray-200 text-xs font-bold mb-2" for="search-name"> Name </label>
      <input
        id="search-name"
        v-model="selectedFilters.searchText"
        class="shadow appearance-none border w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        placeholder="Name"
        type="text"
      />
    </div>
    <div></div>

    <div>
      <label class="block uppercase tracking-wide text-gray-200 text-xs font-bold mb-2" for="search-language">
        Language
      </label>
      <div class="relative">
        <select
          id="search-language"
          v-model="selectedFilters.language"
          class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
        >
          <option :selected="selectedFilters.language === null" :value="null">-</option>
          <option
            v-for="language in languages"
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
    </div>

    <div>
      <label class="block uppercase tracking-wide text-gray-200 text-xs font-bold mb-2" for="search-gender">
        Gender
      </label>
      <div class="relative">
        <select
          id="search-gender"
          v-model="selectedFilters.gender"
          class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
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
    </div>

    <div>
      <label class="block uppercase tracking-wide text-gray-200 text-xs font-bold mb-2" for="search-voice-age">
        Voice Age
      </label>
      <div class="relative">
        <select
          id="search-voice-age"
          v-model="selectedFilters.voiceAge"
          class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
        >
          <option :selected="selectedFilters.voiceAge === null" :value="null">-</option>
          <option
            v-for="voiceAge in voiceAgeOptions"
            :key="voiceAge.value"
            :selected="selectedFilters.voiceAge === voiceAge.value"
            :value="voiceAge.value"
          >
            {{ voiceAge.label }}
          </option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg class="fill-current h-4 w-4" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
          </svg>
        </div>
      </div>
    </div>

    <div>
      <label class="block uppercase tracking-wide text-gray-200 text-xs font-bold mb-2" for="search-voice-style">
        Voice Style
      </label>
      <div class="relative">
        <select
          id="search-voice-style"
          v-model="selectedFilters.voiceStyle"
          class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
        >
          <option :selected="selectedFilters.voiceStyle === null" :value="null">-</option>
          <option
            v-for="voiceStyle in voiceStyleOptions"
            :key="voiceStyle.value"
            :selected="selectedFilters.voiceStyle === voiceStyle.value"
            :value="voiceStyle.value"
          >
            {{ voiceStyle.label }}
          </option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg class="fill-current h-4 w-4" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
          </svg>
        </div>
      </div>
    </div>

    <div></div>
    <div class="flex flex-row-reverse">
      <button class="btn btn--primary" type="submit">Submit</button>
    </div>
  </form>
</template>

<style lang="scss" scoped></style>
