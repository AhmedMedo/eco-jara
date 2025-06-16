<template>
  <div>
    <div class="mb-4">
      <h2 class="text-xl font-semibold">Transactions</h2>
      <p class="text-gray-500">Manage your renewable energy certificates</p>
    </div>

    <FilterPanel @change="val => Object.assign(filters, val)" />

    <div class="flex items-center justify-between mb-4">
      <input
        v-model="search"
        type="text"
        placeholder="Search..."
        class="border border-gray-300 rounded px-3 py-2"
      />
      <ExportButton @csv="exportCsv" @pdf="exportPdf" @excel="exportExcel" />
    </div>

    <div class="overflow-x-auto">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" @click="setSort('project')">Project Name</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" @click="setSort('volume')">Audit Volume</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" @click="setSort('buyer')">Buyer</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" @click="setSort('price')">Price</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Available</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          <tr v-for="tx in paginated" :key="tx.id" class="hover:bg-gray-50">
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ tx.project }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ tx.volume }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ tx.buyer }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm">
              <span :class="['inline-flex items-center', typeColor(tx.type)]">
                <span class="w-2 h-2 rounded-full mr-2" :class="typeBg(tx.type)"></span>{{ tx.type }}
              </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ tx.price }}</td>
            <td class="px-6 py-4 whitespace-nowrap">
              <span :class="statusClass(tx.status)" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full">
                {{ tx.status }}
              </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ tx.available }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
              <button class="text-blue-600 hover:underline mr-2">Edit</button>
              <button class="text-red-600 hover:underline">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="mt-4 flex justify-end space-x-2">
      <button @click="prev" class="btn-secondary" :disabled="page === 1">Prev</button>
      <button @click="next" class="btn-secondary" :disabled="page >= pageCount">Next</button>
    </div>
  </div>
</template>

<script setup>
import { ref, reactive, computed } from 'vue';
import FilterPanel from './shared/FilterPanel.vue';
import ExportButton from './shared/ExportButton.vue';

const search = ref('');
const sortKey = ref('');
const sortAsc = ref(true);
const page = ref(1);
const perPage = 10;
const filters = reactive({ type: '', status: '', from: '', to: '' });

const transactions = ref([
  { id: 1, project: 'Benban Solar Park', volume: '100 MW', buyer: 'Green Energy Corp', type: 'Solar', price: '42500 EGP', status: 'Pending', available: '500 MW' },
  { id: 2, project: 'Zafarana Wind', volume: '200 MW', buyer: 'Cairo Renewables', type: 'Wind', price: '78500 EGP', status: 'Pending', available: '1.2 GW' },
  { id: 3, project: 'Aswan Hydro', volume: '400 MW', buyer: 'Samsung', type: 'Hydro', price: '42500 EGP', status: 'Approved', available: '800 MW' },
  { id: 4, project: 'Benban Solar Park', volume: '100 MW', buyer: 'EBRD', type: 'Bio', price: '42500 EGP', status: 'Cancelled', available: '300 MW' }
]);

const filtered = computed(() => {
  return transactions.value.filter(t => {
    const matchesSearch = Object.values(t).some(v => String(v).toLowerCase().includes(search.value.toLowerCase()));
    const typeOk = !filters.type || t.type === filters.type;
    const statusOk = !filters.status || t.status === filters.status;
    return matchesSearch && typeOk && statusOk;
  });
});

const sorted = computed(() => {
  if (!sortKey.value) return filtered.value;
  return [...filtered.value].sort((a, b) => {
    const res = a[sortKey.value].localeCompare(b[sortKey.value]);
    return sortAsc.value ? res : -res;
  });
});

const pageCount = computed(() => Math.ceil(sorted.value.length / perPage));
const paginated = computed(() => sorted.value.slice((page.value - 1) * perPage, page.value * perPage));

function setSort(key) {
  if (sortKey.value === key) {
    sortAsc.value = !sortAsc.value;
  } else {
    sortKey.value = key;
    sortAsc.value = true;
  }
}

function next() {
  if (page.value < pageCount.value) page.value++;
}
function prev() {
  if (page.value > 1) page.value--;
}

function typeBg(type) {
  return {
    Solar: 'bg-orange-500',
    Wind: 'bg-blue-500',
    Hydro: 'bg-green-500',
    Bio: 'bg-teal-500'
  }[type] || 'bg-gray-400';
}
function typeColor(type) {
  return {
    Solar: 'text-orange-500',
    Wind: 'text-blue-500',
    Hydro: 'text-green-500',
    Bio: 'text-teal-500'
  }[type] || 'text-gray-400';
}
function statusClass(status) {
  return {
    Pending: 'bg-yellow-100 text-yellow-800',
    Approved: 'bg-green-100 text-green-800',
    Cancelled: 'bg-red-100 text-red-800'
  }[status] || 'bg-gray-100 text-gray-800';
}

function exportCsv() { console.log('export csv'); }
function exportPdf() { console.log('export pdf'); }
function exportExcel() { console.log('export excel'); }
</script>
