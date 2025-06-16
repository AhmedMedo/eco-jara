<template>
  <div class="tab-navigation flex border-b mb-4">
    <button
      v-for="tab in tabs"
      :key="tab.value"
      @click="$emit('update', tab.value)"
      :class="[
        'px-4 py-2 focus:outline-none',
        active === tab.value
          ? 'border-b-2 border-green-600 text-green-600'
          : 'text-gray-600 hover:text-gray-800'
      ]"
    >
      {{ tab.label }}
    </button>
  </div>
</template>

<script setup>
const props = defineProps({
  tabs: { type: Array, required: true },
  active: { type: String, required: true }
});
</script>
