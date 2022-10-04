<template>
  <svg class="icon">
    <use :xlink:href="`#icon-${name}`" />
  </svg>
</template>

<script lang="ts">
import { defineAsyncComponent } from 'vue';

const icons = import.meta.glob('../../assets/icons/*.svg');

const asyncIcons: { [key: string]: string } = {};

// eslint-disable-next-line guard-for-in,no-restricted-syntax
for (const path in icons) {
  icons[path]().then((mod: { default?: any }) => {
    // @ts-ignore
    asyncIcons[Object.keys(mod)[0]] = defineAsyncComponent(() => import(/* @vite-ignore */ mod.default));
  });
}
</script>

<script lang="ts" setup>
defineProps<{ name: string }>();
</script>
