<template>
  <div class="flex space-x-2">
    <button @click="$emit('csv')" class="btn-primary">CSV</button>
    <button @click="$emit('pdf')" class="btn-primary">PDF</button>
    <button @click="$emit('excel')" class="btn-primary">Excel</button>
  </div>
</template>

<script setup>
defineEmits(['csv', 'pdf', 'excel']);
</script>
