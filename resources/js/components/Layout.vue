<template>
  <div class="flex h-screen bg-gray-50">
    <!-- Sidebar -->
    <div class="sidebar-gradient w-64 flex flex-col">
      <!-- Logo -->
      <div class="flex items-center px-6 py-6 border-b border-white border-opacity-20">
        <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center mr-3">
          <svg class="w-5 h-5 text-primary-teal" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 2L3 7v11a1 1 0 001 1h12a1 1 0 001-1V7l-7-5z" clip-rule="evenodd"/>
          </svg>
        </div>
        <h1 class="text-xl font-bold text-white">Ecojarah</h1>
      </div>

      <!-- Navigation -->
      <nav class="flex-1 py-6">
        <router-link
          v-for="item in navigation"
          :key="item.name"
          :to="item.href"
          :class="[
            'sidebar-link',
            $route.name === item.href.substring(1) ? 'active' : ''
          ]"
        >
          <component :is="item.icon" class="w-5 h-5 mr-3" />
          {{ item.name }}
        </router-link>
      </nav>

      <!-- User Profile -->
      <div class="p-4 border-t border-white border-opacity-20">
        <div class="flex items-center">
          <img class="w-10 h-10 rounded-full" src="https://images.pexels.com/photos/774909/pexels-photo-774909.jpeg?w=100&h=100&fit=crop&crop=face" alt="Mira Bassem">
          <div class="ml-3">
            <p class="text-sm font-medium text-white">Mira Bassem</p>
            <p class="text-xs text-gray-300">UI/UX Designer</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
      <!-- Header -->
      <header class="bg-white shadow-sm border-b border-gray-200">
        <div class="flex items-center justify-between px-6 py-4">
          <div class="flex items-center">
            <h2 class="text-xl font-semibold text-gray-800">{{ currentPageTitle }}</h2>
          </div>
          
          <div class="flex items-center space-x-4">
            <!-- Search -->
            <div class="relative">
              <input
                type="text"
                placeholder="Search projects..."
                class="w-96 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-teal focus:border-transparent"
              />
              <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
              </svg>
            </div>

            <!-- Notifications -->
            <button class="relative p-2 text-gray-400 hover:text-gray-600 transition-colors duration-200">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5-5 5-5h-5m-6 10v-4a6 6 0 00-12 0v4"/>
              </svg>
              <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
            </button>

            <!-- Profile -->
            <div class="flex items-center">
              <img class="w-8 h-8 rounded-full" src="https://images.pexels.com/photos/774909/pexels-photo-774909.jpeg?w=100&h=100&fit=crop&crop=face" alt="Mira Bassem">
              <span class="ml-2 text-sm font-medium text-gray-700">Mira Bassem</span>
              <svg class="ml-2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
              </svg>
            </div>
          </div>
        </div>
      </header>

      <!-- Page Content -->
      <main class="flex-1 overflow-auto">
        <slot />
      </main>
    </div>
  </div>
</template>

<script setup>
import { computed } from 'vue';
import { useRoute } from 'vue-router';
import {
  HomeIcon,
  ShoppingBagIcon,
  DocumentDuplicateIcon,
  ChartBarIcon,
  CogIcon,
} from '@heroicons/vue/24/outline';

const route = useRoute();

const navigation = [
  { name: 'Dashboard', href: '/dashboard', icon: HomeIcon },
  { name: 'Marketplace', href: '/marketplace', icon: ShoppingBagIcon },
  { name: 'Certificates', href: '/certificates', icon: DocumentDuplicateIcon },
  { name: 'Reports', href: '/reports', icon: ChartBarIcon },
  { name: 'Settings', href: '/settings', icon: CogIcon },
];

const currentPageTitle = computed(() => {
  const currentNav = navigation.find(item => item.href === `/${route.name}`);
  return currentNav ? currentNav.name : 'Dashboard';
});
</script>