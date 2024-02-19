<script setup>
import { ref, onMounted, computed } from 'vue';
import AppNavbar from './components/AppNavbar.vue';
import SidebarLeft from './components/SidebarLeft.vue';
import SidebarRight from './components/SidebarRight.vue';
import AppFooter from './components/AppFooter.vue';
import { useAuthUserStore } from './stores/AuthUserStore';
import { useSettingStore } from './stores/SettingStore';


const deferredPrompt = ref(null);
const authUserStore = useAuthUserStore();
const settingStore = useSettingStore();

const currentThemeMode = computed(() => {
    return settingStore.theme === 'dark' ? 'dark-mode' : '';
});

const dismiss = async () => {
    deferredPrompt.value = null;
}
const install = async () => {
    deferredPrompt.prompt();
}
onMounted(() => {
    window.addEventListener("beforeinstallprompt", e => {
        e.preventDefault();
        // Stash the event so it can be triggered later.
        deferredPrompt.value = e;
    });
    window.addEventListener("appinstalled", () => {
        deferredPrompt.value = null;
    });
})
</script>

<template>
    <!-- <v-app>
        <v-banner  color="info" class="text-left">
            Get our free app. It won't take up space on your phone and also works offline!

            <template v-slot:actions>
                <v-btn text @click="dismiss">Dismiss</v-btn>
                <v-btn text @click="install">Install</v-btn>
            </template>
        </v-banner>
        
    </v-app> -->

    <div v-if="authUserStore.user.name !== ''" class="wrapper" :class="currentThemeMode" id="app">
        <AppNavbar />
        <SidebarLeft />
        <div class="content-wrapper">
            <router-view></router-view>
        </div>
        <SidebarRight />
        <AppFooter />
    </div>
    <div v-else class="login-page" :class="currentThemeMode">
        <router-view></router-view>
    </div>
</template>