<script lang="ts" setup>
import { reactive, watch } from 'vue';
import { SelectedFilters } from './typings/filterForm.types';

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
      <input
        id="searchByNameInput"
        v-model="selectedFilters.searchText"
        type="text"
        name="searchByName"
        class="w-full"
        placeholder="Name"
      />
    </div>
    <div></div>
    <div>
      <select id="filterByLanguageSelect" v-model="selectedFilters.language" name="filterByLanguage" class="w-full">
        <option :value="null" :selected="selectedFilters.language === null" disabled>Language</option>
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
    </div>
    <div>
      <select id="filterByGenderSelect" v-model="selectedFilters.gender" name="filterByGender" class="w-full">
        <option :value="null" :selected="selectedFilters.gender === null" disabled>Gender</option>
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
    </div>
    <div>
      <select id="filterByVoiceAgeSelect" v-model="selectedFilters.voiceAge" name="filterByVoiceAge" class="w-full">
        <option :value="null" :selected="selectedFilters.voiceAge === null" disabled>Voice Age</option>
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
    </div>
    <div>
      <select
        id="filterByVoiceStyleSelect"
        v-model="selectedFilters.voiceStyle"
        name="filterByVoiceStyle"
        class="w-full"
      >
        <option :value="null" :selected="selectedFilters.voiceStyle === null" disabled>Voice Style</option>
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
    </div>
    <div></div>
    <div class="flex flex-row-reverse">
      <button type="submit">Submit</button>
    </div>
  </form>
</template>

<style scoped lang="scss"></style>
