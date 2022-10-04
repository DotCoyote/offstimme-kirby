<script lang="ts" setup>
import { ENotificationType } from './notification.types';

defineProps<{
  type: ENotificationType;
}>();
</script>

<template>
  <div
    class="notification border-solid border rounded text-base px-4 py-3 w-full text-center"
    data-test="notification"
    :class="{
      'bg-red-50 text-red-600 border-red-300': type === ENotificationType.DANGER,
      'bg-green-50 text-green-700 border-green-300': type === ENotificationType.SUCCESS,
      'bg-orange-50 text-orange-700 border-orange-300': type === ENotificationType.WARNING,
      'bg-blue-50 text-blue-500 border-blue-300': type === ENotificationType.INFO,
    }"
  >
    <slot />
  </div>
</template>
