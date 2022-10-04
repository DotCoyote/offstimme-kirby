<script lang="ts" setup>
import { computed, ref } from 'vue';
import { Voice } from './typings/voice.types';

const props = defineProps<{
  actor: Voice.BASE;
}>();

const visibleDataIndex = ref(props.actor.content.voiceprobes[0].id);

const hasMultipleDataSets = computed(() => props.actor.content.voiceprobes.length > 1);

const visibleDataSet = computed(() => {
  const voiceFile = props.actor.files.find((file) => file.id === visibleDataIndex.value);
  if (!voiceFile) {
    return undefined;
  }
  return {
    language: voiceFile.content.language,
    flag: voiceFile.content.countryflag[0],
    audio: voiceFile.url,
  };
});

function toggleVisibleDataIndex(fileId: string) {
  visibleDataIndex.value = fileId;
}
</script>

<template>
  <div>
    <div class="flex flex-row justify-between h-8">
      <div v-if="visibleDataSet" class="flex flex-row items-center">
        <img :src="visibleDataSet.flag.url" :alt="visibleDataSet.language" />
        <span class="ml-2">{{ visibleDataSet.language }}</span>
      </div>
      <div v-if="hasMultipleDataSets" class="flex flex-row">
        <button
          v-for="(file, index) in actor.content.voiceprobes"
          :key="file.id"
          class="block px-3 py-1"
          :class="{ 'bg-gray-700': file.id === visibleDataIndex, 'bg-gray-800': file.id !== visibleDataIndex }"
          @click="toggleVisibleDataIndex(file.id)"
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
      <figure v-if="visibleDataSet" class="p-2 mt-4 w-full">
        <audio controls :src="visibleDataSet.audio" class="w-full">
          <p>
            Your browser does not support HTML audio, but you can still
            <a :href="visibleDataSet.audio">download the music</a>.
          </p>
        </audio>
      </figure>

      <div class="flex flex-row-reverse p-2"><a href="" class="btn btn--primary">Request</a></div>
    </div>
  </div>
</template>
