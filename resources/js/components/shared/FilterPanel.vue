<template>
  <div class="flex space-x-4 mb-4">
    <select v-model="filters.type" class="border-gray-300 rounded">
      <option value="">All Types</option>
      <option value="Solar">Solar</option>
      <option value="Wind">Wind</option>
      <option value="Hydro">Hydro</option>
      <option value="Bio">Bio</option>
    </select>

    <select v-model="filters.status" class="border-gray-300 rounded">
      <option value="">All Status</option>
      <option value="Pending">Pending</option>
      <option value="Approved">Approved</option>
      <option value="Cancelled">Cancelled</option>
    </select>

    <input type="date" v-model="filters.from" class="border-gray-300 rounded" />
    <input type="date" v-model="filters.to" class="border-gray-300 rounded" />

    <button @click="clear" class="btn-secondary">Clear</button>
  </div>
</template>

<script setup>
import { reactive, watch } from 'vue';
const emit = defineEmits(['change']);

const filters = reactive({ type: '', status: '', from: '', to: '' });

watch(filters, () => emit('change', { ...filters }), { deep: true });

function clear() {
  filters.type = '';
  filters.status = '';
  filters.from = '';
  filters.to = '';
}
</script>
