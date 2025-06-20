import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import BuyerApp from './BuyerApp.vue';

// Import buyer components
import BuyerLogin from './components/buyer/BuyerLogin.vue';
import BuyerRegister from './components/buyer/BuyerRegister.vue';
import BuyerAccountReview from './components/buyer/BuyerAccountReview.vue';
import BuyerDashboard from './components/buyer/BuyerDashboard.vue';
import BuyerMarketplace from './components/buyer/BuyerMarketplace.vue';
import BuyerProjectDetail from './components/buyer/BuyerProjectDetail.vue';
import BuyerCertificates from './components/buyer/BuyerCertificates.vue';
import BuyerReports from './components/buyer/BuyerReports.vue';
import BuyerSettings from './components/buyer/BuyerSettings.vue';

// Setup router for buyer
const routes = [
    { path: '/', redirect: '/buyer/login' },
    { path: '/buyer/login', component: BuyerLogin, name: 'buyer-login' },
    { path: '/buyer/register', component: BuyerRegister, name: 'buyer-register' },
    { path: '/buyer/account-review', component: BuyerAccountReview, name: 'buyer-account-review' },
    { path: '/buyer/dashboard', component: BuyerDashboard, name: 'buyer-dashboard' },
    { path: '/buyer/marketplace', component: BuyerMarketplace, name: 'buyer-marketplace' },
    { path: '/buyer/marketplace/project/:id', component: BuyerProjectDetail, name: 'buyer-project-detail' },
    { path: '/buyer/certificates', component: BuyerCertificates, name: 'buyer-certificates' },
    { path: '/buyer/reports', component: BuyerReports, name: 'buyer-reports' },
    { path: '/buyer/settings', component: BuyerSettings, name: 'buyer-settings' }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

// Setup axios
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
}

const app = createApp(BuyerApp);
app.use(router);
app.mount('#buyer-app');