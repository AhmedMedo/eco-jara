<template>
  <div class="bg-white rounded-lg shadow-sm">
    <div class="px-6 py-4 border-b border-gray-200">
      <h3 class="text-lg font-semibold text-gray-900">Projects</h3>
    </div>
    <div class="overflow-x-auto">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="table-header">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Project ID</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Project Name</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Country</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Commission Date</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Registration Date</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Expiry Date</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Capacity</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Volume</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Available</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Redemption</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          <tr v-for="project in projects" :key="project.id" class="hover:bg-gray-50 transition-colors duration-200">
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-primary-teal">{{ project.id }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ project.name }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ project.country }}</td>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="flex items-center">
                <component :is="project.typeIcon" :class="project.typeColor" class="w-4 h-4 mr-2" />
                <span class="text-sm text-gray-900">{{ project.type }}</span>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ project.commissionDate }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ project.registrationDate }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ project.expiryDate }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ project.capacity }}</td>
            <td class="px-6 py-4 whitespace-nowrap">
              <span :class="project.statusClass" class="status-badge">{{ project.status }}</span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ project.totalVolume }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ project.totalAvailable }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ project.totalRedemption }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const projects = ref([
  {
    id: 'IREC-20230001',
    name: 'Benban Solar Park',
    country: 'Egypt',
    type: 'Solar',
    typeIcon: 'SunIcon',
    typeColor: 'text-orange-500',
    commissionDate: '01-01-2020',
    registrationDate: '01-05-2020',
    expiryDate: '01-01-2030',
    capacity: '50 MW',
    status: 'Active',
    statusClass: 'status-active',
    totalVolume: '5000',
    totalAvailable: '3000',
    totalRedemption: '2000'
  },
  {
    id: 'IREC-20230002',
    name: 'Zafarana Wind',
    country: 'Egypt',
    type: 'Wind',
    typeIcon: 'WindIcon',
    typeColor: 'text-blue-500',
    commissionDate: '01-01-2020',
    registrationDate: '01-05-2020',
    expiryDate: '01-01-2030',
    capacity: '50 MW',
    status: 'Inactive',
    statusClass: 'status-inactive',
    totalVolume: '5000',
    totalAvailable: '3000',
    totalRedemption: '2000'
  },
  {
    id: 'IREC-20230003',
    name: 'Aswan Hydro',
    country: 'Egypt',
    type: 'Hydro',
    typeIcon: 'WaterIcon',
    typeColor: 'text-cyan-500',
    commissionDate: '01-01-2020',
    registrationDate: '01-05-2020',
    expiryDate: '01-01-2030',
    capacity: '50 MW',
    status: 'Cancelled',
    statusClass: 'status-cancelled',
    totalVolume: '5000',
    totalAvailable: '3000',
    totalRedemption: '2000'
  },
  {
    id: 'IREC-20230004',
    name: 'Benban Solar Park',
    country: 'Egypt',
    type: 'Bio',
    typeIcon: 'LeafIcon',
    typeColor: 'text-green-500',
    commissionDate: '01-01-2020',
    registrationDate: '01-05-2020',
    expiryDate: '01-01-2030',
    capacity: '50 MW',
    status: 'Inactive',
    statusClass: 'status-inactive',
    totalVolume: '5000',
    totalAvailable: '3000',
    totalRedemption: '2000'
  }
]);
</script>
