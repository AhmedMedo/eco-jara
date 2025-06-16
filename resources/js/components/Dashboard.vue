<template>
  <Layout>
    <div class="p-6">
      <ProjectOverview />
      <TabNavigation
        class="mt-6"
        :tabs="tabs"
        :active="activeTab"
        @update="val => (activeTab = val)"
      />
      <div class="mt-4">
        <ProjectsTable v-if="activeTab === 'projects'" />
        <TransactionsTable v-if="activeTab === 'transactions'" />
      </div>
    </div>
  </Layout>
</template>

<script setup>
import { ref } from 'vue';
import Layout from './Layout.vue';
import ProjectOverview from './ProjectOverview.vue';
import ProjectsTable from './ProjectsTable.vue';
import TransactionsTable from './TransactionsTable.vue';
import TabNavigation from './shared/TabNavigation.vue';

const tabs = [
  { label: 'Projects', value: 'projects' },
  { label: 'Transactions', value: 'transactions' }
];

const activeTab = ref('projects');
</script>
