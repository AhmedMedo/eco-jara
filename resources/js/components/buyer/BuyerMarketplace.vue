<template>
  <BuyerLayout>
    <div class="p-6">
      <!-- Header -->
      <div class="flex items-center justify-between mb-6">
        <div class="flex items-center space-x-4">
          <button 
            @click="viewMode = 'list'"
            :class="[
              'p-2 rounded-lg transition-colors duration-200',
              viewMode === 'list' ? 'bg-primary-teal text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'
            ]"
          >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
            </svg>
          </button>
          <button 
            @click="viewMode = 'grid'"
            :class="[
              'p-2 rounded-lg transition-colors duration-200',
              viewMode === 'grid' ? 'bg-primary-teal text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'
            ]"
          >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
            </svg>
          </button>
          <h1 class="text-xl font-semibold text-gray-900">IREC Marketplace</h1>
        </div>
        
        <div class="flex items-center space-x-3">
          <button 
            @click="showFilters = !showFilters"
            :class="[
              'btn-secondary flex items-center',
              showFilters ? 'bg-primary-teal text-white' : ''
            ]"
          >
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
            </svg>
            Filter
          </button>
          <button class="btn-secondary flex items-center">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
            </svg>
            Export
          </button>
          <button 
            @click="showCalculator = true"
            class="btn-primary flex items-center"
          >
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
            </svg>
            Calculator
          </button>
        </div>
      </div>

      <!-- Filters -->
      <div v-if="showFilters" class="bg-white rounded-lg shadow-sm p-6 mb-6 transition-all duration-300">
        <div class="flex items-center space-x-4 mb-4">
          <button 
            v-for="type in energyTypes" 
            :key="type.name"
            @click="selectedEnergyType = type.name"
            :class="[
              'px-4 py-2 rounded-full text-sm font-medium transition-colors duration-200',
              selectedEnergyType === type.name 
                ? 'bg-primary-teal text-white' 
                : 'bg-gray-100 text-gray-700 hover:bg-gray-200'
            ]"
          >
            {{ type.name }}
          </button>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Price Range (EGP)</label>
            <div class="flex space-x-2">
              <input 
                type="number" 
                placeholder="Min" 
                v-model="filters.priceMin"
                class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-teal focus:border-transparent"
              />
              <input 
                type="number" 
                placeholder="Max" 
                v-model="filters.priceMax"
                class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-teal focus:border-transparent"
              />
            </div>
          </div>
          
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Vintage Year</label>
            <select 
              v-model="filters.vintageYear"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-teal focus:border-transparent"
            >
              <option value="">All</option>
              <option v-for="year in [2023, 2024, 2025]" :key="year" :value="year">{{ year }}</option>
            </select>
          </div>
          
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Country</label>
            <select 
              v-model="filters.country"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-teal focus:border-transparent"
            >
              <option value="">All</option>
              <option value="Egypt">Egypt</option>
              <option value="UAE">UAE</option>
              <option value="Saudi Arabia">Saudi Arabia</option>
            </select>
          </div>
          
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Certification</label>
            <select 
              v-model="filters.certification"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-teal focus:border-transparent"
            >
              <option value="">All</option>
              <option value="IREC">IREC</option>
              <option value="I-REC">I-REC</option>
            </select>
          </div>
        </div>
        
        <div class="flex justify-end space-x-3 mt-4">
          <button @click="resetFilters" class="btn-secondary">Reset</button>
          <button @click="applyFilters" class="btn-primary">Apply Filters</button>
        </div>
      </div>

      <!-- Grid View -->
      <div v-if="viewMode === 'grid'" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div v-for="project in filteredProjects" :key="project.id" class="project-card cursor-pointer" @click="viewProject(project)">
          <div class="relative h-48 bg-gradient-to-br from-orange-400 to-orange-600 overflow-hidden">
            <img 
              :src="project.image" 
              :alt="project.name"
              class="w-full h-full object-cover"
            />
            <div class="absolute top-4 left-4">
              <span class="bg-black bg-opacity-30 text-white px-2 py-1 rounded text-xs">
                {{ project.vintage }} Vintage
              </span>
            </div>
          </div>
          
          <div class="p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ project.name }}</h3>
            
            <div class="flex items-center space-x-4 mb-4">
              <div class="flex items-center text-sm text-gray-600">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                {{ project.country }}
              </div>
              
              <div class="flex items-center text-sm">
                <component :is="getEnergyIcon(project.type)" :class="getEnergyColor(project.type)" class="w-4 h-4 mr-1" />
                <span class="text-gray-600">{{ project.type }}</span>
              </div>
            </div>
            
            <div class="flex items-center justify-between mb-4">
              <div>
                <p class="text-sm text-gray-600">Available</p>
                <p class="text-lg font-semibold text-gray-900">{{ project.capacity }}</p>
              </div>
              <div class="text-right">
                <p class="text-sm text-gray-600">Price</p>
                <p class="text-lg font-semibold text-gray-900">{{ project.price }}</p>
                <p class="text-xs text-gray-500">(VAT Incl.)</p>
              </div>
            </div>
            
            <div class="flex items-center justify-between text-sm text-gray-600 mb-4">
              <div class="flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
                {{ project.viewing }} viewing
              </div>
              <div class="flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                {{ project.expires }}
              </div>
            </div>
            
            <button @click.stop="buyNow(project)" class="w-full btn-primary">Buy Now</button>
          </div>
        </div>
      </div>

      <!-- Table View -->
      <div v-if="viewMode === 'list'" class="bg-white rounded-lg shadow-sm overflow-hidden">
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
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Vintage</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="project in filteredProjects" :key="project.id" class="hover:bg-gray-50 transition-colors duration-200 cursor-pointer" @click="viewProject(project)">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-primary-teal">{{ project.projectId }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ project.name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ project.country }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <component :is="getEnergyIcon(project.type)" :class="getEnergyColor(project.type)" class="w-4 h-4 mr-2" />
                    <span class="text-sm text-gray-900">{{ project.type }}</span>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ project.commissionDate }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ project.registrationDate }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ project.expiryDate }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ project.capacity }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span :class="getStatusClass(project.status)" class="status-badge">{{ project.status }}</span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ project.totalVolume }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ project.totalAvailable }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ project.vintage }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <button @click.stop="viewProject(project)" class="bg-primary-teal text-white px-3 py-1 rounded text-sm hover:bg-primary-teal-dark transition-colors duration-200 mr-2">
                    View
                  </button>
                  <button @click.stop="buyNow(project)" class="bg-green-600 text-white px-3 py-1 rounded text-sm hover:bg-green-700 transition-colors duration-200">
                    Buy
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Calculator Modal -->
    <div v-if="showCalculator" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
      <div class="bg-white rounded-lg max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <div class="p-6">
          <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Calculate Your IREC Requirements</h2>
            <button @click="showCalculator = false" class="text-gray-400 hover:text-gray-600 transition-colors duration-200">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
              </svg>
            </button>
          </div>
          
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
              <h3 class="text-lg font-semibold text-gray-900 mb-4">Annual Energy Consumption</h3>
              <div class="flex">
                <input
                  type="number"
                  v-model="calculator.energyConsumption"
                  placeholder="Enter amount"
                  class="flex-1 px-4 py-3 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-primary-teal focus:border-transparent"
                />
                <select
                  v-model="calculator.unit"
                  class="px-4 py-3 border border-l-0 border-gray-300 rounded-r-lg bg-yellow-50 focus:ring-2 focus:ring-primary-teal focus:border-transparent"
                >
                  <option value="kWh">kWh</option>
                  <option value="MWh">MWh</option>
                  <option value="GWh">GWh</option>
                </select>
              </div>
            </div>
            
            <div>
              <h3 class="text-lg font-semibold text-gray-900 mb-4">Region</h3>
              <select
                v-model="calculator.region"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-teal focus:border-transparent"
              >
                <option value="">Select Region</option>
                <option value="Middle East">Middle East</option>
                <option value="North Africa">North Africa</option>
                <option value="Europe">Europe</option>
                <option value="Asia">Asia</option>
              </select>
            </div>
          </div>
          
          <div class="bg-yellow-50 rounded-lg p-6 mb-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Estimated IREC Requirements</h3>
            <div class="bg-primary-teal rounded-full h-3 mb-4"></div>
            <div class="flex items-center justify-between">
              <div>
                <p class="text-sm text-gray-600">Based on your input</p>
                <p class="text-2xl font-bold text-gray-900">{{ calculatedRequirement }} MWh</p>
              </div>
              <div class="text-right">
                <p class="text-sm text-gray-600">Offset CO₂</p>
                <p class="text-2xl font-bold text-gray-900">{{ calculatedOffset }} tons</p>
              </div>
            </div>
          </div>
          
          <div class="flex justify-center">
            <button @click="browseIRECs" class="btn-primary flex items-center">
              Browse IRECs
              <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </BuyerLayout>
</template>

<script setup>
import { ref, computed } from 'vue';
import { useRouter } from 'vue-router';
import BuyerLayout from './BuyerLayout.vue';

const router = useRouter();
const viewMode = ref('grid');
const showFilters = ref(false);
const showCalculator = ref(false);
const selectedEnergyType = ref('All');

const energyTypes = ref([
  { name: 'All' },
  { name: 'Solar' },
  { name: 'Wind' },
  { name: 'Hydro' },
  { name: 'Bio' }
]);

const filters = ref({
  priceMin: '',
  priceMax: '',
  vintageYear: '',
  country: '',
  certification: ''
});

const calculator = ref({
  energyConsumption: '',
  unit: 'kWh',
  region: ''
});

const projects = ref([
  {
    id: 1,
    projectId: 'IREC-20230001',
    name: 'Benban Solar Park',
    country: 'Egypt',
    type: 'Solar',
    capacity: '1,500 MWh',
    price: 'EGP 45.2 /MWh',
    image: 'https://images.pexels.com/photos/9800029/pexels-photo-9800029.jpeg?w=500&h=300&fit=crop',
    vintage: '2024',
    viewing: '16',
    expires: 'Expires in 30 days',
    commissionDate: '01-01-2020',
    registrationDate: '01-05-2020',
    expiryDate: '01-01-2030',
    status: 'Active',
    totalVolume: '5000',
    totalAvailable: '3000'
  },
  {
    id: 2,
    projectId: 'IREC-20230002',
    name: 'Zafarana Wind',
    country: 'Egypt',
    type: 'Wind',
    capacity: '1,500 MWh',
    price: 'EGP 45.2 /MWh',
    image: 'https://images.pexels.com/photos/433308/pexels-photo-433308.jpeg?w=500&h=300&fit=crop',
    vintage: '2025',
    viewing: '16',
    expires: 'Expires in 30 days',
    commissionDate: '01-01-2020',
    registrationDate: '01-05-2020',
    expiryDate: '01-01-2030',
    status: 'Inactive',
    totalVolume: '5000',
    totalAvailable: '3000'
  },
  {
    id: 3,
    projectId: 'IREC-20230003',
    name: 'Aswan Hydro',
    country: 'Egypt',
    type: 'Hydro',
    capacity: '1,500 MWh',
    price: 'EGP 45.2 /MWh',
    image: 'https://images.pexels.com/photos/1591447/pexels-photo-1591447.jpeg?w=500&h=300&fit=crop',
    vintage: '2024',
    viewing: '16',
    expires: 'Expires in 30 days',
    commissionDate: '01-01-2020',
    registrationDate: '01-05-2020',
    expiryDate: '01-01-2030',
    status: 'Cancelled',
    totalVolume: '5000',
    totalAvailable: '3000'
  },
  {
    id: 4,
    projectId: 'IREC-20230004',
    name: 'Bio Energy Plant',
    country: 'Egypt',
    type: 'Bio',
    capacity: '1,500 MWh',
    price: 'EGP 45.2 /MWh',
    image: 'https://images.pexels.com/photos/9800029/pexels-photo-9800029.jpeg?w=500&h=300&fit=crop',
    vintage: '2023',
    viewing: '16',
    expires: 'Expires in 30 days',
    commissionDate: '01-01-2020',
    registrationDate: '01-05-2020',
    expiryDate: '01-01-2030',
    status: 'Active',
    totalVolume: '5000',
    totalAvailable: '3000'
  }
]);

const filteredProjects = computed(() => {
  let filtered = projects.value;
  
  if (selectedEnergyType.value !== 'All') {
    filtered = filtered.filter(project => project.type === selectedEnergyType.value);
  }
  
  if (filters.value.country) {
    filtered = filtered.filter(project => project.country === filters.value.country);
  }
  
  if (filters.value.vintageYear) {
    filtered = filtered.filter(project => project.vintage === filters.value.vintageYear.toString());
  }
  
  return filtered;
});

const calculatedRequirement = computed(() => {
  if (!calculator.value.energyConsumption) return '650';
  
  let value = parseFloat(calculator.value.energyConsumption);
  
  // Convert to MWh if needed
  if (calculator.value.unit === 'kWh') {
    value = value / 1000;
  } else if (calculator.value.unit === 'GWh') {
    value = value * 1000;
  }
  
  return Math.round(value).toLocaleString();
});

const calculatedOffset = computed(() => {
  const requirement = parseFloat(calculatedRequirement.value.replace(/,/g, ''));
  return Math.round(requirement * 0.5).toLocaleString(); // Assuming 0.5 tons CO2 per MWh
});

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
    Active: 'status-active',
    Inactive: 'status-inactive',
    Cancelled: 'status-cancelled'
  };
  return classes[status] || 'status-inactive';
};

const resetFilters = () => {
  filters.value = {
    priceMin: '',
    priceMax: '',
    vintageYear: '',
    country: '',
    certification: ''
  };
  selectedEnergyType.value = 'All';
};

const applyFilters = () => {
  // Apply filters logic here
  showFilters.value = false;
};

const browseIRECs = () => {
  showCalculator.value = false;
  // Scroll to projects or navigate
};

const viewProject = (project) => {
  router.push({ name: 'buyer-project-detail', params: { id: project.projectId } });
};

const buyNow = (project) => {
  // Handle direct purchase
  console.log('Buy now:', project.name);
};
</script>