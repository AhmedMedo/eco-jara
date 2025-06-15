<template>
  <BuyerLayout>
    <div class="p-6">
      <!-- KPI Cards -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-primary-teal">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm font-medium text-gray-600">Total IRECs</p>
              <p class="text-2xl font-bold text-gray-900 mt-1">3,500</p>
              <p class="text-xs text-gray-500 mt-1">MWh</p>
            </div>
            <div class="bg-primary-teal bg-opacity-10 p-3 rounded-lg">
              <svg class="w-6 h-6 text-primary-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
              </svg>
            </div>
          </div>
          <div class="flex items-center mt-3">
            <span class="text-green-600 text-sm font-medium">+12.5%</span>
          </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-blue-500">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm font-medium text-gray-600">Energy Consumption</p>
              <p class="text-2xl font-bold text-gray-900 mt-1">4,200</p>
              <p class="text-xs text-gray-500 mt-1">MWh</p>
            </div>
            <div class="bg-blue-500 bg-opacity-10 p-3 rounded-lg">
              <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
              </svg>
            </div>
          </div>
          <div class="flex items-center mt-3">
            <span class="text-blue-600 text-sm font-medium">83.3%</span>
          </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-green-500">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm font-medium text-gray-600">Renewable Energy</p>
              <div class="relative w-16 h-16 mt-2">
                <svg class="w-16 h-16 transform -rotate-90" viewBox="0 0 36 36">
                  <path
                    d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                    fill="none"
                    stroke="#e5e7eb"
                    stroke-width="2"
                  />
                  <path
                    d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                    fill="none"
                    stroke="#22c55e"
                    stroke-width="2"
                    :stroke-dasharray="`${83 * 0.83}, 100`"
                  />
                </svg>
                <div class="absolute inset-0 flex items-center justify-center">
                  <span class="text-sm font-bold text-gray-900">83%</span>
                </div>
              </div>
            </div>
            <div class="bg-green-500 bg-opacity-10 p-3 rounded-lg">
              <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
              </svg>
            </div>
          </div>
        </div>
      </div>

      <!-- Charts Section -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- IREC by Vintage Chart -->
        <div class="bg-white rounded-lg shadow-sm p-6">
          <h3 class="text-lg font-semibold text-gray-900 mb-4">Total IREC by Vintage (Year)</h3>
          <div class="h-64">
            <canvas ref="vintageChart"></canvas>
          </div>
        </div>

        <!-- Monthly Activity -->
        <div class="bg-white rounded-lg shadow-sm p-6">
          <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Statistics</h3>
          </div>
          <div class="grid grid-cols-1 gap-6">
            <!-- Monthly Activity Pie Chart -->
            <div>
              <h4 class="text-md font-medium text-gray-700 mb-3">Monthly activity</h4>
              <div class="flex items-center justify-center">
                <div class="relative w-48 h-48">
                  <canvas ref="monthlyChart"></canvas>
                  <div class="absolute inset-0 flex items-center justify-center">
                    <div class="text-center">
                      <p class="text-xl font-bold text-gray-900">47,482.27</p>
                      <p class="text-sm text-gray-500">MWh</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mt-4 grid grid-cols-2 gap-2 text-sm">
                <div class="flex items-center">
                  <div class="w-3 h-3 bg-teal-500 rounded-full mr-2"></div>
                  <span class="text-gray-600">Wind - 5,000 MWh</span>
                </div>
                <div class="flex items-center">
                  <div class="w-3 h-3 bg-orange-500 rounded-full mr-2"></div>
                  <span class="text-gray-600">Solar - 25,000 MWh</span>
                </div>
                <div class="flex items-center">
                  <div class="w-3 h-3 bg-blue-500 rounded-full mr-2"></div>
                  <span class="text-gray-600">Hydro - 30,000 MWh</span>
                </div>
                <div class="flex items-center">
                  <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                  <span class="text-gray-600">Bio - 25,000 MWh</span>
                </div>
              </div>
            </div>

            <!-- Total Bid Chart -->
            <div>
              <h4 class="text-md font-medium text-gray-700 mb-3">Total Bid</h4>
              <div class="h-32">
                <canvas ref="bidChart"></canvas>
              </div>
              <div class="mt-2 flex items-center justify-center space-x-4 text-xs">
                <div class="flex items-center">
                  <div class="w-2 h-2 bg-green-500 rounded-full mr-1"></div>
                  <span class="text-gray-600">Approved</span>
                </div>
                <div class="flex items-center">
                  <div class="w-2 h-2 bg-yellow-500 rounded-full mr-1"></div>
                  <span class="text-gray-600">Pending</span>
                </div>
                <div class="flex items-center">
                  <div class="w-2 h-2 bg-red-500 rounded-full mr-1"></div>
                  <span class="text-gray-600">Cancelled</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Active Certificates Table -->
      <div class="bg-white rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
          <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-900">Active Certificates</h3>
            <p class="text-sm text-gray-500">Manage your renewable energy certificates</p>
            <div class="flex items-center space-x-3">
              <button class="btn-secondary flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                </svg>
                Filter
              </button>
              <button class="btn-primary flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                </svg>
                Export
              </button>
            </div>
          </div>
        </div>
        
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="table-header">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Certificate ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Project Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Country</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Volume</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Redemption</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Vintage (Year)</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price (total cost)</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Avg. Price per IREC</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="certificate in certificates" :key="certificate.id" class="hover:bg-gray-50 transition-colors duration-200">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-primary-teal">{{ certificate.id }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ certificate.name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ certificate.country }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <component :is="certificate.typeIcon" :class="certificate.typeColor" class="w-4 h-4 mr-2" />
                    <span class="text-sm text-gray-900">{{ certificate.type }}</span>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ certificate.totalVolume }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ certificate.totalRedemption }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ certificate.vintage }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ certificate.totalCost }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ certificate.avgPrice }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <button class="bg-primary-teal text-white px-3 py-1 rounded text-sm hover:bg-primary-teal-dark transition-colors duration-200">
                    Buy
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </BuyerLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import BuyerLayout from './BuyerLayout.vue';
import { Chart, registerables } from 'chart.js';

Chart.register(...registerables);

const vintageChart = ref(null);
const monthlyChart = ref(null);
const bidChart = ref(null);

const certificates = ref([
  {
    id: 'IREC-20230001',
    name: 'Benban Solar Park',
    country: 'Egypt',
    type: 'Bio',
    typeIcon: 'LeafIcon',
    typeColor: 'text-green-500',
    totalVolume: '1500 MWh',
    totalRedemption: '80%',
    vintage: '2024',
    totalCost: 'EGP 42500',
    avgPrice: 'EGP 45.2'
  },
  {
    id: 'IREC-20230001',
    name: 'Zafarana Wind',
    country: 'Egypt',
    type: 'Solar',
    typeIcon: 'SunIcon',
    typeColor: 'text-orange-500',
    totalVolume: '1500 MWh',
    totalRedemption: '80%',
    vintage: '2024',
    totalCost: 'EGP 42500',
    avgPrice: 'EGP 45.2'
  },
  {
    id: 'IREC-20230001',
    name: 'Gulf of Suez',
    country: 'Egypt',
    type: 'Wind',
    typeIcon: 'WindIcon',
    typeColor: 'text-blue-500',
    totalVolume: '1500 MWh',
    totalRedemption: '80%',
    vintage: '2024',
    totalCost: 'EGP 42500',
    avgPrice: 'EGP 45.2'
  },
  {
    id: 'IREC-20230001',
    name: 'SolarTech Egypt',
    country: 'Egypt',
    type: 'Hydro',
    typeIcon: 'WaterIcon',
    typeColor: 'text-cyan-500',
    totalVolume: '1500 MWh',
    totalRedemption: '80%',
    vintage: '2024',
    totalCost: 'EGP 42500',
    avgPrice: 'EGP 45.2'
  },
  {
    id: 'IREC-20230001',
    name: 'Benban Solar Park',
    country: 'Egypt',
    type: 'Solar',
    typeIcon: 'SunIcon',
    typeColor: 'text-orange-500',
    totalVolume: '1500 MWh',
    totalRedemption: '80%',
    vintage: '2024',
    totalCost: 'EGP 42500',
    avgPrice: 'EGP 45.2'
  },
  {
    id: 'IREC-20230001',
    name: 'Zafarana Wind',
    country: 'Egypt',
    type: 'Bio',
    typeIcon: 'LeafIcon',
    typeColor: 'text-green-500',
    totalVolume: '1500 MWh',
    totalRedemption: '80%',
    vintage: '2024',
    totalCost: 'EGP 42500',
    avgPrice: 'EGP 45.2'
  },
  {
    id: 'IREC-20230001',
    name: 'Gulf of Suez',
    country: 'Egypt',
    type: 'Wind',
    typeIcon: 'WindIcon',
    typeColor: 'text-blue-500',
    totalVolume: '1500 MWh',
    totalRedemption: '80%',
    vintage: '2024',
    totalCost: 'EGP 42500',
    avgPrice: 'EGP 45.2'
  }
]);

onMounted(() => {
  // Initialize Vintage Chart (Area Chart)
  if (vintageChart.value) {
    new Chart(vintageChart.value, {
      type: 'line',
      data: {
        labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
        datasets: [{
          data: [20, 35, 25, 45, 55, 40, 35, 50, 45, 40, 55, 60],
          borderColor: '#14b8a6',
          backgroundColor: 'rgba(20, 184, 166, 0.1)',
          borderWidth: 2,
          fill: true,
          tension: 0.4,
          pointBackgroundColor: '#14b8a6',
          pointBorderColor: '#fff',
          pointBorderWidth: 2,
          pointRadius: 4
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          x: {
            grid: {
              display: false
            }
          },
          y: {
            beginAtZero: true,
            max: 70,
            ticks: {
              stepSize: 10,
              callback: function(value) {
                return value + 'k';
              }
            }
          }
        },
        elements: {
          point: {
            hoverRadius: 6
          }
        }
      }
    });
  }

  // Initialize Monthly Activity Pie Chart
  if (monthlyChart.value) {
    new Chart(monthlyChart.value, {
      type: 'doughnut',
      data: {
        labels: ['Wind', 'Solar', 'Hydro', 'Bio'],
        datasets: [{
          data: [11, 24, 26, 39],
          backgroundColor: ['#14b8a6', '#f97316', '#3b82f6', '#22c55e'],
          borderWidth: 0,
        }]
      },
      options: {
        cutout: '70%',
        plugins: {
          legend: {
            display: false
          }
        },
        maintainAspectRatio: false
      }
    });
  }

  // Initialize Bid Chart (Multi-line Chart)
  if (bidChart.value) {
    new Chart(bidChart.value, {
      type: 'line',
      data: {
        labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
        datasets: [
          {
            data: [60, 55, 65, 70, 75, 80, 85, 80, 75, 70, 75, 80],
            borderColor: '#22c55e',
            backgroundColor: 'transparent',
            borderWidth: 2,
            tension: 0.4,
            pointRadius: 0
          },
          {
            data: [40, 45, 35, 50, 45, 40, 35, 45, 50, 55, 50, 45],
            borderColor: '#eab308',
            backgroundColor: 'transparent',
            borderWidth: 2,
            tension: 0.4,
            pointRadius: 0
          },
          {
            data: [20, 25, 30, 25, 20, 15, 20, 25, 20, 15, 20, 25],
            borderColor: '#ef4444',
            backgroundColor: 'transparent',
            borderWidth: 2,
            tension: 0.4,
            pointRadius: 0
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          x: {
            grid: {
              display: false
            },
            ticks: {
              font: {
                size: 10
              }
            }
          },
          y: {
            beginAtZero: true,
            max: 100,
            ticks: {
              stepSize: 20,
              callback: function(value) {
                return value + '%';
              },
              font: {
                size: 10
              }
            },
            grid: {
              color: '#f3f4f6'
            }
          }
        }
      }
    });
  }
});
</script>