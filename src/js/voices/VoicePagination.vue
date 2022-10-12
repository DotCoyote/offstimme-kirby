<script lang="ts" setup>
import { computed } from 'vue';

const props = defineProps<{
  pagination: { page: number; total: number; offset: number; limit: number };
  itemsOnPage: number;
}>();

const $emit = defineEmits<{
  (e: 'page-change', data: number): void;
}>();

const pages = computed(() => Math.ceil(props.pagination.total / props.pagination.limit) || 1);
const pageUrl = computed(() => (pageNum: number) => {
  const url = new URL(window.location.href);
  url.searchParams.set('page', String(pageNum));
  return url;
});

function onLinkClick(page: number) {
  $emit('page-change', page);
}

const prevPageNum = computed(() => props.pagination.page - 1);
const nextPageNum = computed(() => props.pagination.page + 1);
const hasPrevPage = computed(() => props.pagination.page > 1);
const hasNextPage = computed(() => props.pagination.page < Math.ceil(props.pagination.total / props.pagination.limit));
const prevPageUrl = computed(() => pageUrl.value(prevPageNum.value));
const nextPageUrl = computed(() => pageUrl.value(props.pagination.page + 1));

const results = computed(() =>
  props.pagination.total > 0
    ? {
        start: (props.pagination.page - 1) * props.pagination.limit + 1,
        end: hasNextPage.value
          ? props.pagination.page * props.pagination.limit
          : props.pagination.limit * (props.pagination.page - 1) + props.itemsOnPage,
      }
    : {
        start: 0,
        end: 0,
      },
);
</script>

<template>
  <div class="flex flex-row justify-between">
    <div class="pagination flex flex-row gap-2">
      <a
        :class="{
          'opacity-50 cursor-not-allowed': !hasPrevPage,
        }"
        :href="prevPageUrl"
        class="block py-1 px-2 text-sm bg-gray-900"
        @click.prevent="hasPrevPage && onLinkClick(prevPageNum)"
      >
        &lt;
      </a>
      <a
        v-for="page in pages"
        :key="page"
        :class="{
          'bg-primary': page === pagination.page,
          'bg-gray-900': page !== pagination.page,
        }"
        :href="pageUrl(page)"
        class="block py-1 px-2 text-sm"
        @click.prevent="page !== pagination.page && onLinkClick(page)"
      >
        {{ page }}
      </a>
      <a
        :class="{
          'opacity-50 cursor-not-allowed': !hasNextPage,
        }"
        :href="nextPageUrl"
        class="block py-1 px-2 text-sm bg-gray-900"
        @click.prevent="hasNextPage && onLinkClick(nextPageNum)"
      >
        &gt;
      </a>
    </div>

    <div>Results: {{ results.start }} - {{ results.end }} of {{ pagination.total }}</div>
  </div>
</template>
