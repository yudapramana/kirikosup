import './bootstrap';


import 'admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js';

import 'admin-lte/dist/js/adminlte.min.js';

import { createApp } from 'vue/dist/vue.esm-bundler.js';

import { createPinia } from 'pinia';

import { createRouter, createWebHashHistory, createWebHistory } from 'vue-router';

import Routes from './routes.js';

import Login from './pages/auth/Login.vue';

import App from './App.vue';

import { useAuthUserStore } from './stores/AuthUserStore.js';
import { useSettingStore } from './stores/SettingStore.js';
import { useMonthYearStore } from './stores/MonthYearStore.js';
import PrimeVue from 'primevue/config';
import { useDashboardStore } from './stores/DashboardStore.js';
import { useMasterDataStore } from './stores/MasterDataStore.js';
import Select2 from 'vue3-select2-component';
// import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

const vuetify = createVuetify({
    components,
    directives
})

const pinia = createPinia();
const app = createApp(App);

const router = createRouter({
    routes: Routes,
    history: createWebHistory(),
});

router.beforeEach(async (to, from) => {
    const authUserStore = useAuthUserStore();
    if (authUserStore.user.name === '' && to.name !== 'admin.login') {
        const settingStore = useSettingStore();
        const monthYearStore = useMonthYearStore();
        const dashboardStore = useDashboardStore();
        const masterDataStore = useMasterDataStore();

        await Promise.all([
            authUserStore.getAuthUser(),
            settingStore.getSetting(),
            monthYearStore.setMonthYear(),
            dashboardStore.getReportsCount(),
            dashboardStore.getStatsCount(),
            masterDataStore.getOrgList()
        ]);

    }
});

app.use(pinia);
app.use(router);
app.use(PrimeVue);
app.use(vuetify);
app.component('Select2', Select2);



// if(window.location.pathname === '/login') {
//     const currentApp = createApp({});
//     currentApp.component('Login', Login);
//     currentApp.mount('#login');
// } else {
//     app.mount('#app');
// }

app.mount('#app');
