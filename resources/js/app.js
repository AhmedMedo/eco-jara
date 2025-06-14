import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import App from './App.vue';
import './bootstrap';
import '../css/app.css';

// Import components
import Login from './components/Login.vue';
import Dashboard from './components/Dashboard.vue';
import Marketplace from './components/Marketplace.vue';
import Certificates from './components/Certificates.vue';
import Reports from './components/Reports.vue';
import Settings from './components/Settings.vue';

// Setup router
const routes = [
    { path: '/', redirect: '/login' },
    { path: '/login', component: Login, name: 'login' },
    { path: '/dashboard', component: Dashboard, name: 'dashboard' },
    { path: '/marketplace', component: Marketplace, name: 'marketplace' },
    { path: '/certificates', component: Certificates, name: 'certificates' },
    { path: '/reports', component: Reports, name: 'reports' },
    { path: '/settings', component: Settings, name: 'settings' }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});


const app = createApp(App);
app.use(router);
app.mount('#app');