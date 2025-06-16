<template>
  <div>
    <!-- KPI Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
      <!-- Use existing markup from Dashboard.vue for KPIs -->
      <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-primary-teal">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm font-medium text-gray-600">Total Certificates Listed</p>
            <p class="text-2xl font-bold text-gray-900 mt-1">3,500</p>
            <p class="text-xs text-gray-500 mt-1">MW</p>
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

      <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-green-500">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm font-medium text-gray-600">Revenue Generated</p>
            <p class="text-2xl font-bold text-gray-900 mt-1">175,000</p>
            <p class="text-xs text-gray-500 mt-1">EGP</p>
          </div>
          <div class="bg-green-500 bg-opacity-10 p-3 rounded-lg">
            <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
            </svg>
          </div>
        </div>
        <div class="flex items-center mt-3">
          <span class="text-red-600 text-sm font-medium">-3.2%</span>
        </div>
      </div>

      <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-blue-500">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm font-medium text-gray-600">Market Share</p>
            <div class="relative w-16 h-16 mt-2">
              <svg class="w-16 h-16 transform -rotate-90" viewBox="0 0 36 36">
                <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="#e5e7eb" stroke-width="2" />
                <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="#3b82f6" stroke-width="2" :stroke-dasharray="`${28.4 * 0.284}, 100`" />
              </svg>
              <div class="absolute inset-0 flex items-center justify-center">
                <span class="text-sm font-bold text-gray-900">28.4</span>
              </div>
            </div>
          </div>
          <div class="bg-blue-500 bg-opacity-10 p-3 rounded-lg">
            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/>
            </svg>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-purple-500">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm font-medium text-gray-600">Approval Rate</p>
            <div class="relative w-16 h-16 mt-2">
              <svg class="w-16 h-16 transform -rotate-90" viewBox="0 0 36 36">
                <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="#e5e7eb" stroke-width="2" />
                <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="#8b5cf6" stroke-width="2" :stroke-dasharray="`${83.3 * 0.833}, 100`" />
              </svg>
              <div class="absolute inset-0 flex items-center justify-center">
                <span class="text-sm font-bold text-gray-900">83.3%</span>
              </div>
            </div>
          </div>
          <div class="bg-purple-500 bg-opacity-10 p-3 rounded-lg">
            <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
          </div>
        </div>
      </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
      <!-- Energy Distribution -->
      <div class="bg-white rounded-lg shadow-sm p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Energy Distribution</h3>
        <div class="flex items-center justify-center">
          <div class="relative w-64 h-64">
            <canvas ref="pieChart"></canvas>
            <div class="absolute inset-0 flex items-center justify-center">
              <div class="text-center">
                <p class="text-2xl font-bold text-gray-900">47,482.27</p>
                <p class="text-sm text-gray-500">MWh</p>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-6 grid grid-cols-2 gap-4">
          <div class="flex items-center">
            <div class="w-3 h-3 bg-teal-500 rounded-full mr-2"></div>
            <span class="text-sm text-gray-600">Wind - 5,000 MWh</span>
          </div>
          <div class="flex items-center">
            <div class="w-3 h-3 bg-orange-500 rounded-full mr-2"></div>
            <span class="text-sm text-gray-600">Solar - 25,000 MWh</span>
          </div>
          <div class="flex items-center">
            <div class="w-3 h-3 bg-blue-500 rounded-full mr-2"></div>
            <span class="text-sm text-gray-600">Hydro - 30,000 MWh</span>
          </div>
          <div class="flex items-center">
            <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
            <span class="text-sm text-gray-600">Bio - 25,000 MWh</span>
          </div>
        </div>
      </div>

      <!-- Monthly Activity -->
      <div class="bg-white rounded-lg shadow-sm p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Monthly Activity</h3>
        <div class="h-64">
          <canvas ref="lineChart"></canvas>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { Chart, registerables } from 'chart.js';
Chart.register(...registerables);
const pieChart = ref(null);
const lineChart = ref(null);

onMounted(() => {
  if (pieChart.value) {
    new Chart(pieChart.value, {
      type: 'doughnut',
      data: {
        labels: ['Wind', 'Solar', 'Hydro', 'Bio'],
        datasets: [{
          data: [26, 24, 39, 11],
          backgroundColor: ['#3b82f6', '#f97316', '#22c55e', '#14b8a6'],
          borderWidth: 0
        }]
      },
      options: { cutout: '70%', plugins: { legend: { display: false } }, maintainAspectRatio: false }
    });
  }
  if (lineChart.value) {
    new Chart(lineChart.value, {
      type: 'line',
      data: {
        labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
        datasets: [{
          data: [3, 4, 3.5, 5, 4.5, 4, 4.5, 5.5, 4, 3.5, 4, 5],
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
        plugins: { legend: { display: false } },
        scales: { x: { grid: { display: false } }, y: { beginAtZero: true, max: 6, ticks: { stepSize: 1, callback: v => v + 'k' } } },
        elements: { point: { hoverRadius: 6 } }
      }
    });
  }
});
</script>
