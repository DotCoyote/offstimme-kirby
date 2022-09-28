<script lang="ts" setup>
import { onMounted, ref } from 'vue';

const voices = ref();

async function requestVoices() {
  try {
    const response = await fetch('/api/pages/voices/children?select=content', {
      method: 'GET',
      headers: {
        'X-CSRF': window.csrf,
        'X-Language': 'en_US',
      },
    });
    const responseJson = await response.json();
    voices.value = responseJson.data;
  } catch (e) {
    console.error(e);
  }
}

onMounted(() => {
  requestVoices();
});
</script>

<template>
  <h1>VoicesTemplate</h1>
</template>

<style scoped lang="scss"></style>
