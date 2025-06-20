<template>
  <BuyerLayout>
    <div class="min-h-screen bg-gray-50">
      <!-- Hero Section with Project Image -->
      <div class="relative h-80 bg-gradient-to-r from-blue-900 to-blue-700 overflow-hidden">
        <img 
          :src="project.image" 
          :alt="project.name"
          class="w-full h-full object-cover opacity-80"
        />
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/70 to-transparent"></div>
        
        <!-- Project Header Info -->
        <div class="absolute bottom-0 left-0 right-0 p-8">
          <div class="max-w-7xl mx-auto">
            <div class="flex items-end justify-between">
              <div class="text-white">
                <h1 class="text-4xl font-bold mb-2">{{ project.name }}</h1>
                <p class="text-blue-100 mb-4">Project ID: {{ project.id }}</p>
                
                <div class="flex items-center space-x-6 text-sm">
                  <div class="flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    {{ project.country }}
                  </div>
                  
                  <div class="flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    {{ project.type }}
                  </div>
                  
                  <div class="flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 8a2 2 0 100-4 2 2 0 000 4zm0 0v4a2 2 0 002 2h6a2 2 0 002-2v-4a2 2 0 00-2-2H10a2 2 0 00-2 2z"/>
                    </svg>
                    {{ project.vintage }} Vintage
                  </div>
                </div>
              </div>
              
              <div class="flex items-center space-x-3">
                <button class="p-2 bg-white/20 hover:bg-white/30 rounded-lg text-white transition-colors duration-200">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"/>
                  </svg>
                </button>
                <button class="p-2 bg-white/20 hover:bg-white/30 rounded-lg text-white transition-colors duration-200">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Main Content -->
      <div class="max-w-7xl mx-auto px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
          <!-- Left Content -->
          <div class="lg:col-span-2">
            <!-- Navigation Tabs -->
            <div class="border-b border-gray-200 mb-8">
              <nav class="flex space-x-8">
                <button
                  v-for="tab in tabs"
                  :key="tab.id"
                  @click="activeTab = tab.id"
                  :class="[
                    'py-4 px-1 border-b-2 font-medium text-sm transition-colors duration-200',
                    activeTab === tab.id
                      ? 'border-primary-teal text-primary-teal'
                      : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
                  ]"
                >
                  {{ tab.name }}
                </button>
              </nav>
            </div>

            <!-- Tab Content -->
            <div v-if="activeTab === 'overview'">
              <!-- Map Section -->
              <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                <div class="h-80 bg-gray-100 rounded-lg flex items-center justify-center">
                  <div class="text-center text-gray-500">
                    <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-1.447-.894L15 4m0 13V4m-6 3l6-3"/>
                    </svg>
                    <p class="text-lg font-medium">Project Location Map</p>
                    <p class="text-sm">Interactive map showing project location</p>
                  </div>
                </div>
              </div>

              <!-- Description -->
              <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                <h3 class="text-xl font-semibold text-orange-600 mb-4">Description</h3>
                <p class="text-gray-700 leading-relaxed">
                  {{ project.description }}
                </p>
              </div>

              <!-- Project Link -->
              <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                <h3 class="text-xl font-semibold text-orange-600 mb-4">Project Link</h3>
                <a 
                  :href="project.projectLink" 
                  target="_blank"
                  class="text-primary-teal hover:text-primary-teal-dark underline break-all"
                >
                  {{ project.projectLink }}
                </a>
              </div>

              <!-- Project Details Grid -->
              <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-yellow-50 rounded-lg p-6">
                  <h4 class="text-sm font-medium text-gray-600 mb-2">Capacity</h4>
                  <p class="text-2xl font-bold text-gray-900">{{ project.capacity }}</p>
                </div>
                
                <div class="bg-yellow-50 rounded-lg p-6">
                  <h4 class="text-sm font-medium text-gray-600 mb-2">Technology</h4>
                  <p class="text-2xl font-bold text-gray-900">{{ project.technology }}</p>
                </div>
                
                <div class="bg-yellow-50 rounded-lg p-6">
                  <h4 class="text-sm font-medium text-gray-600 mb-2">Operator</h4>
                  <p class="text-2xl font-bold text-gray-900">{{ project.operator }}</p>
                </div>
              </div>
            </div>

            <!-- Certificate Data Tab -->
            <div v-if="activeTab === 'certificate'" class="bg-white rounded-lg shadow-sm p-6">
              <h3 class="text-lg font-semibold text-gray-900 mb-4">Certificate Information</h3>
              <div class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                  <div>
                    <label class="block text-sm font-medium text-gray-600">Commission Date</label>
                    <p class="text-gray-900">{{ project.commissionDate }}</p>
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-600">Registration Date</label>
                    <p class="text-gray-900">{{ project.registrationDate }}</p>
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-600">Expiry Date</label>
                    <p class="text-gray-900">{{ project.expiryDate }}</p>
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-600">Total Volume</label>
                    <p class="text-gray-900">{{ project.totalVolume }} MWh</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Documentation Tab -->
            <div v-if="activeTab === 'documentation'" class="bg-white rounded-lg shadow-sm p-6">
              <h3 class="text-lg font-semibold text-gray-900 mb-4">Project Documentation</h3>
              <div class="space-y-3">
                <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg">
                  <div class="flex items-center">
                    <svg class="w-5 h-5 text-red-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                    <span class="text-gray-900">Project Certificate.pdf</span>
                  </div>
                  <button class="text-primary-teal hover:text-primary-teal-dark">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                  </button>
                </div>
                <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg">
                  <div class="flex items-center">
                    <svg class="w-5 h-5 text-red-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                    <span class="text-gray-900">Technical Specifications.pdf</span>
                  </div>
                  <button class="text-primary-teal hover:text-primary-teal-dark">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                  </button>
                </div>
              </div>
            </div>

            <!-- Core Metrics Tab -->
            <div v-if="activeTab === 'metrics'" class="bg-white rounded-lg shadow-sm p-6">
              <h3 class="text-lg font-semibold text-gray-900 mb-4">Core Metrics</h3>
              <div class="grid grid-cols-2 gap-6">
                <div>
                  <label class="block text-sm font-medium text-gray-600 mb-2">Annual Generation</label>
                  <p class="text-2xl font-bold text-gray-900">{{ project.annualGeneration }} MWh</p>
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-600 mb-2">CO₂ Reduction</label>
                  <p class="text-2xl font-bold text-gray-900">{{ project.co2Reduction }} tons/year</p>
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-600 mb-2">Efficiency Rate</label>
                  <p class="text-2xl font-bold text-gray-900">{{ project.efficiency }}%</p>
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-600 mb-2">Availability</label>
                  <p class="text-2xl font-bold text-gray-900">{{ project.availability }}%</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Right Sidebar - Bulk Purchase -->
          <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-sm p-6 sticky top-8">
              <h3 class="text-xl font-semibold text-gray-900 mb-6">Bulk Purchase</h3>
              
              <!-- Quantity Input -->
              <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Quantity (MWh)</label>
                <div class="relative">
                  <input
                    v-model="purchaseQuantity"
                    type="number"
                    :min="1"
                    :max="project.maxQuantity"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-teal focus:border-transparent"
                    placeholder="100 MWh"
                  />
                  <div class="absolute right-3 top-3 text-sm text-gray-500">
                    Max: {{ project.maxQuantity.toLocaleString() }} MWh
                  </div>
                </div>
                
                <!-- Quantity Slider -->
                <div class="mt-4">
                  <input
                    v-model="purchaseQuantity"
                    type="range"
                    :min="1"
                    :max="project.maxQuantity"
                    class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer slider"
                  />
                </div>
              </div>

              <!-- Price Breakdown -->
              <div class="space-y-3 mb-6">
                <div class="flex justify-between text-sm">
                  <span class="text-gray-600">Price per MWh:</span>
                  <span class="font-medium">EGP {{ project.pricePerMWh }}</span>
                </div>
                <div class="flex justify-between text-sm">
                  <span class="text-gray-600">Quantity:</span>
                  <span class="font-medium">{{ purchaseQuantity.toLocaleString() }} MWh</span>
                </div>
                <hr class="border-gray-200">
                <div class="flex justify-between text-lg font-semibold">
                  <span class="text-gray-900">Total Price:</span>
                  <span class="text-primary-teal">EGP {{ totalPrice.toLocaleString() }}</span>
                </div>
              </div>

              <!-- Info Message -->
              <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                <div class="flex">
                  <svg class="w-5 h-5 text-blue-500 mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                  </svg>
                  <div class="text-sm text-blue-700">
                    <p class="font-medium mb-1">Sustainable Impact</p>
                    <p>By purchasing this certificate, you are directly supporting renewable energy production and contributing to a more sustainable future.</p>
                  </div>
                </div>
              </div>

              <!-- Action Buttons -->
              <div class="space-y-3">
                <button
                  @click="saveToWatchlist"
                  class="w-full flex items-center justify-center px-4 py-3 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200"
                >
                  <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                  </svg>
                  Save to Watchlist
                </button>
                
                <button
                  @click="buyNow"
                  class="w-full flex items-center justify-center px-4 py-3 bg-primary-teal text-white rounded-lg hover:bg-primary-teal-dark transition-colors duration-200"
                >
                  <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                  </svg>
                  Buy Now
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </BuyerLayout>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import BuyerLayout from './BuyerLayout.vue';

const route = useRoute();
const router = useRouter();

const activeTab = ref('overview');
const purchaseQuantity = ref(100);

const tabs = [
  { id: 'overview', name: 'Overview' },
  { id: 'certificate', name: 'Certificate Data' },
  { id: 'documentation', name: 'Documentation' },
  { id: 'metrics', name: 'Core Metrics' }
];

// Mock project data - in real app, this would come from API
const project = ref({
  id: '#IREC-329823',
  name: 'Landfill Gas Management Project in Bandung',
  country: 'Egypt',
  type: 'Solar',
  vintage: '2024',
  image: 'https://images.pexels.com/photos/9800029/pexels-photo-9800029.jpeg?w=1200&h=400&fit=crop',
  description: 'Abu Zabal Landfill Gas Recovery and Flaring/Destruction Project. Abu Zabal Landfill Gas Recovery and Flaring/Destruction Project',
  projectLink: 'https://cdm.unfccc.int/Projects/Validation/DB/DJD59ANCGPEZYSFM8M09QLACCOY7LYview.html',
  capacity: '187,000',
  technology: 'Landfill Gas Management',
  operator: 'PT Dharma Utama',
  commissionDate: '01-01-2020',
  registrationDate: '01-05-2020',
  expiryDate: '01-01-2030',
  totalVolume: '5000',
  pricePerMWh: 40.5,
  maxQuantity: 1800,
  annualGeneration: '450,000',
  co2Reduction: '225,000',
  efficiency: '92.5',
  availability: '98.2'
});

const totalPrice = computed(() => {
  return purchaseQuantity.value * project.value.pricePerMWh;
});

const saveToWatchlist = () => {
  // Handle save to watchlist
  console.log('Saved to watchlist');
};

const buyNow = () => {
  // Handle purchase
  console.log('Purchase initiated for', purchaseQuantity.value, 'MWh');
};

onMounted(() => {
  // Load project data based on route params
  const projectId = route.params.id;
  console.log('Loading project:', projectId);
});
</script>

<style scoped>
.slider::-webkit-slider-thumb {
  appearance: none;
  height: 20px;
  width: 20px;
  border-radius: 50%;
  background: #167070;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  height: 20px;
  width: 20px;
  border-radius: 50%;
  background: #167070;
  cursor: pointer;
  border: none;
}
</style>