<script lang="ts" setup>
import { computed, ref } from 'vue';
import { useI18n } from 'vue-i18n';
import { Voice } from './typings/voice.types';

const { t } = useI18n();

const props = defineProps<{
  actor: Voice.BASE;
}>();

const visibleDataIndex = ref(
  props.actor.content.voiceprobes.length ? props.actor.content.voiceprobes[0].file[0].uuid : '',
);

const hasMultipleDataSets = computed(() => props.actor.content.voiceprobes.length > 1);

const visibleDataSet = computed(() => {
  const voiceFile = props.actor.content.voiceprobes.find((file) => file.file[0].uuid === visibleDataIndex.value);
  if (!voiceFile) {
    return undefined;
  }

  return {
    language: voiceFile.language,
    flag: voiceFile.flag || null,
    audio: voiceFile.file[0].url,
  };
});

function toggleVisibleDataIndex(fileId: string) {
  visibleDataIndex.value = fileId;
}
</script>

<template>
  <a :href="actor.url">
    <div class="flex flex-row justify-between h-8">
      <div v-if="visibleDataSet" class="flex flex-row items-center">
        <img v-if="visibleDataSet.flag" :src="visibleDataSet.flag" :alt="visibleDataSet.language" />
        <span class="ml-2">{{ visibleDataSet.language }}</span>
      </div>
      <div v-if="hasMultipleDataSets" class="flex flex-row">
        <button
          v-for="(file, index) in actor.content.voiceprobes"
          :key="file.file[0].uuid"
          class="block px-3 py-1"
          :class="{
            'bg-gray-700': file.file[0].uuid === visibleDataIndex,
            'bg-gray-800': file.file[0].uuid !== visibleDataIndex,
          }"
          @click="toggleVisibleDataIndex(file.file[0].uuid)"
        >
          {{ index + 1 }}
        </button>
      </div>
    </div>
    <div class="block bg-gray-700">
      <div class="flex flex-row">
        <div class="w-20 h-20">
          <img
            v-if="actor.content.image.length"
            :src="actor.content.image[0].url"
            class="w-full h-full object-cover"
            alt=""
          />
        </div>
        <div class="ml-4 pt-2 leading-tight">
          <h3>{{ actor.content.title }}</h3>
          <span class="text-sm">{{ actor.content.country }}</span>
        </div>
      </div>
      <div v-if="visibleDataSet" class="flex flex-row items-center mt-4">
        <figure class="p-2 w-full">
          <audio controls :src="visibleDataSet.audio" class="w-full">
            <p>
              Your browser does not support HTML audio, but you can still
              <a :href="visibleDataSet.audio">download the music</a>.
            </p>
          </audio>
        </figure>
        <a
          :href="visibleDataSet.audio"
          download
          :title="t('voiceActors.download')"
          class="btn btn--primary inline-flex items-center text-white !p-2"
        >
          <svg
            fill="none"
            stroke="currentColor"
            stroke-width="1.5"
            viewBox="0 0 24 24"
            class="w-6 h-6"
            xmlns="http://www.w3.org/2000/svg"
            aria-hidden="true"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"
            ></path>
          </svg>
          <span class="ml-2 sr-only">{t('voiceActors.download')}</span>
        </a>
      </div>

      <div class="flex flex-row-reverse p-2"><a href="" class="btn btn--primary">Request</a></div>
    </div>
  </a>
</template>
