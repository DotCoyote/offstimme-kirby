<script lang="ts" setup>
import { computed, defineAsyncComponent, onMounted, ref } from 'vue';
import { Voice } from './typings/voice.types';
import FilterForm from './FilterForm.vue';
import { Pagination } from './typings/pagination.types';
import { ENotificationType } from '../shared/Notification/notification.types';
import { Language } from './typings/language.types';
import { useVoiceFilterOptions } from '../shared/composables/useVoiceFilterOptions';
import { SelectedFilters } from './typings/filterForm.types';

const SvgIcon = defineAsyncComponent(() => import('../shared/SvgIcon/SvgIcon.vue'));
const Notification = defineAsyncComponent(() => import('../shared/Notification/NotificationComponent.vue'));
const VoiceActor = defineAsyncComponent(() => import('./VoiceActor.vue'));
const VoicePagination = defineAsyncComponent(() => import('./VoicePagination.vue'));

const isLoading = ref(false);
const error = ref<string>();
const voices = ref<Voice.BASE[]>([]);
const languages = ref<Language[]>([]);

const voicePaginationData = ref<Pagination>({
  total: 0,
  limit: 0,
  offset: 0,
  page: 0,
});

interface PostParams {
  search?: string | any[];
  filterBy?: unknown[];
}

const { mapUrlParams, selectedFilters } = useVoiceFilterOptions();

async function requestVoices(newPage = 1) {
  const limit = 16;
  try {
    error.value = '';
    isLoading.value = true;

    const url = new URL(window.location.href);
    url.searchParams.set('page', String(newPage));
    window.history.pushState({ path: String(url) }, '', url);

    const postParams: PostParams = {
      search: selectedFilters.searchText || [],
      filterBy: [],
    };

    if (!postParams.filterBy) {
      return;
    }
    if (selectedFilters.voiceAge) {
      postParams.filterBy.push({
        field: 'voiceAge',
        value: [selectedFilters.voiceAge],
        operator: 'in',
      });
    }
    if (selectedFilters.language) {
      postParams.filterBy.push({
        field: 'voiceProbes',
        value: selectedFilters.language,
        operator: '*=',
      });
    }
    if (selectedFilters.gender) {
      postParams.filterBy.push({
        field: 'sex',
        value: [selectedFilters.gender],
        operator: 'in',
      });
    }
    if (selectedFilters.voiceStyle) {
      postParams.filterBy.push({
        field: 'voiceStyle',
        value: [selectedFilters.voiceStyle],
        operator: 'in',
      });
    }

    const response = await fetch(
      `/api/pages/stimmen/children/search?select=content,files,url&limit=${limit}&page=${newPage}`,
      {
        method: 'POST',
        body: JSON.stringify(postParams),
        headers: {
          'x-csrf': window.csrf,
          'x-language': window.lang,
        },
      },
    );
    if (response.status >= 400 && response.status < 600) {
      throw response.statusText;
    }
    const responseJson = await response.json();
    voices.value = responseJson.data as Voice.BASE[];
    voicePaginationData.value = responseJson.pagination as Pagination;
  } catch (e: unknown) {
    error.value = e as string;
  } finally {
    isLoading.value = false;
  }
}

function onFormSubmit(selectedFiltersFromForm: SelectedFilters) {
  Object.keys(selectedFilters).forEach((key) => {
    if (key in selectedFiltersFromForm) {
      selectedFilters[key] = selectedFiltersFromForm[key];
    }
  });
  requestVoices();
}

onMounted(() => {
  mapUrlParams();
  const url = new URL(window.location.href);
  const currentPage = parseInt(url.searchParams.get('page')?.toString() || '1', 10);
  requestVoices(currentPage);
});

async function onPageChange(newPage: number) {
  await requestVoices(newPage);
}

const itemsOnPage = computed(() => voices.value.length || 0);
</script>

<template>
  <div class="container px-4">
    <filter-form :languages="languages" @form-submit="onFormSubmit" />
    <div class="relative">
      <div
        v-show="isLoading"
        class="absolute inset-0 flex text-primary justify-center p-8 z-10 bg-gray-900 bg-opacity-75 items-center"
      >
        <svg-icon class="animate-spin w-12 h-12" name="loading" />
      </div>

      <notification v-if="error" :type="ENotificationType.DANGER" class="my-6 mx-auto max-w-2xl"
        >{{ error }}
      </notification>

      <voice-pagination
        v-if="voicePaginationData"
        :items-on-page="itemsOnPage"
        :pagination="voicePaginationData"
        class="mt-4"
        @page-change="onPageChange"
      />
      <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
        <voice-actor v-for="voice in voices" :key="voice.content.uuid" :actor="voice" />
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped></style>
