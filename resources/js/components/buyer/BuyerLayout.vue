<template>
  <div class="flex h-screen bg-gray-50">
    <!-- Sidebar -->
    <div class="sidebar-gradient w-64 flex flex-col">
      <!-- Logo -->
      <div class="flex items-center px-6 py-6 border-b border-white border-opacity-20">
        <img :src="logo" alt="Ecojarah" class="w-8 h-8 mr-3" />
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
            $route.path === item.href ? 'active' : ''
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
            <!-- Placeholder for header actions -->
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
import logo from '../../../images/logo.png';

const route = useRoute();

const navigation = [
  { name: 'Dashboard', href: '/buyer/dashboard', icon: HomeIcon },
  { name: 'Marketplace', href: '/buyer/marketplace', icon: ShoppingBagIcon },
  { name: 'Certificates', href: '/buyer/certificates', icon: DocumentDuplicateIcon },
  { name: 'Reports', href: '/buyer/reports', icon: ChartBarIcon },
  { name: 'Settings', href: '/buyer/settings', icon: CogIcon },
];

const currentPageTitle = computed(() => {
  const currentNav = navigation.find(item => item.href === route.path);
  return currentNav ? currentNav.name : 'Dashboard';
});
</script>
