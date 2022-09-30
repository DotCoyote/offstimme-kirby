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
      {{ actor.content.title }}
      {{ actor.content.voiceage[0] }}
      <figure v-if="visibleDataSet" class="p-2 flex flex-row items-center justify-center">
        <audio controls :src="visibleDataSet.audio"></audio>
      </figure>
    </div>
  </div>
</template>
