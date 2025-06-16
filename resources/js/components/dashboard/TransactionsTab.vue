<template>
  <div class="p-6">
    <div class="mb-4">
      <h3 class="text-lg font-semibold text-gray-900 mb-2">Transactions</h3>
      <p class="text-sm text-gray-600">Manage your renewable energy certificates</p>
    </div>

    <div class="overflow-x-auto">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="table-header">
        <tr>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Project Name</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sold Volume</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Buyer</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Available</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
        </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        <tr v-for="transaction in transactions" :key="transaction.id" class="hover:bg-gray-50 transition-colors duration-200">
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ transaction.projectName }}</td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ transaction.soldVolume }}</td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ transaction.buyer }}</td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex items-center">
              <component :is="getEnergyIcon(transaction.type)" :class="getEnergyColor(transaction.type)" class="w-4 h-4 mr-2" />
              <span class="text-sm text-gray-900">{{ transaction.type }}</span>
            </div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ transaction.price }}</td>
          <td class="px-6 py-4 whitespace-nowrap">
            <span :class="getStatusClass(transaction.status)" class="status-badge">{{ transaction.status }}</span>
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ transaction.totalAvailable }}</td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex space-x-2">
              <button
                  v-if="transaction.status === 'Pending'"
                  class="bg-green-600 text-white px-3 py-1 rounded text-sm hover:bg-green-700 transition-colors duration-200"
              >
                Approve
              </button>
              <button
                  v-if="transaction.status === 'Pending'"
                  class="bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700 transition-colors duration-200"
              >
                Reject
              </button>
              <button
                  v-if="transaction.status === 'Approved'"
                  class="bg-primary-teal text-white px-3 py-1 rounded text-sm hover:bg-primary-teal-dark transition-colors duration-200"
              >
                View
              </button>
            </div>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const transactions = ref([
  {
    id: 1,
    projectName: 'Benban Solar Park',
    soldVolume: '500 MW',
    buyer: 'Green Energy Corp',
    type: 'Solar',
    price: '42500 EGP',
    status: 'Pending',
    totalAvailable: '3000'
  },
  {
    id: 2,
    projectName: 'Zafarana Wind',
    soldVolume: '300 MW',
    buyer: 'Cairo Renewables',
    type: 'Wind',
    price: '25000 EGP',
    status: 'Pending',
    totalAvailable: '2500'
  },
  {
    id: 3,
    projectName: 'Aswan Hydro',
    soldVolume: '400 MW',
    buyer: 'Samsung',
    type: 'Hydro',
    price: '42500 EGP',
    status: 'Approved',
    totalAvailable: '2000'
  },
  {
    id: 4,
    projectName: 'Benban Solar Park',
    soldVolume: '200 MW',
    buyer: 'EGPC',
    type: 'Bio',
    price: '42500 EGP',
    status: 'Cancelled',
    totalAvailable: '1800'
  }
]);

const getEnergyIcon = (type) => {
  const icons = {
    Solar: 'SunIcon',
    Wind: 'WindIcon',
    Hydro: 'WaterDropIcon',
    Bio: 'LeafIcon'
  };
  return icons[type] || 'BoltIcon';
};

const getEnergyColor = (type) => {
  const colors = {
    Solar: 'text-orange-500',
    Wind: 'text-blue-500',
    Hydro: 'text-cyan-500',
    Bio: 'text-green-500'
  };
  return colors[type] || 'text-gray-500';
};

const getStatusClass = (status) => {
  const classes = {
    Approved: 'status-active',
    Pending: 'status-inactive',
    Cancelled: 'status-cancelled'
  };
  return classes[status] || 'status-inactive';
};
</script>