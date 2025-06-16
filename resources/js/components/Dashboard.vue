<template>
  <Layout>
    <div class="p-6">
      <TabNavigation :tabs="tabs" :active="activeTab" @update="val => activeTab = val" />
      <div class="tab-content mt-4">
        <ProjectOverview v-if="activeTab === 'overview'" />
        <TransactionsTable v-if="activeTab === 'transactions'" />
      </div>
    </div>
  </Layout>
</template>

<script setup>
import { ref } from 'vue';
import Layout from './Layout.vue';
import ProjectOverview from './ProjectOverview.vue';
import TransactionsTable from './TransactionsTable.vue';
import TabNavigation from './shared/TabNavigation.vue';

const tabs = [
  { label: 'Project Overview', value: 'overview' },
  { label: 'Transactions', value: 'transactions' }
];

const activeTab = ref('overview');
</script>
