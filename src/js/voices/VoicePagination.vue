<script lang="ts" setup>
import { computed } from 'vue';

const props = defineProps<{
  pagination: { page: number; total: number; offset: number; limit: number };
}>();

const pages = computed(() => Math.ceil(props.pagination.total / props.pagination.limit));
const pageUrl = computed(() => (pageNum: number) => {
  const url = new URL(window.location.href);
  url.searchParams.set('page', String(pageNum));
  return url;
});
</script>

<template>
  <div class="pagination flex flex-row gap-2">
    <a
      v-for="page in pages"
      :key="page"
      :href="pageUrl(page)"
      class="block py-1 px-2 text-sm"
      :class="{
        'bg-primary': page === pagination.page,
      }"
    >
      {{ page }}
    </a>
  </div>
</template>

<style scoped lang="scss"></style>
