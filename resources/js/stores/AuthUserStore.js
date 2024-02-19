import axios from 'axios';
import { defineStore } from 'pinia';
import { ref } from 'vue';
import { useStorage } from '@vueuse/core';


export const useAuthUserStore = defineStore('AuthUserStore', () => {
    const user = useStorage('AuthUserStore:user', ref({
        name: '',
        email: '',
        role: '',
        avatar: '',
        nama_pemeriksa: '',
        nip_pemeriksa: '',
        jabatan: '',
        org_name: '',
        org_id: '',
    }));
    
    const getAuthUser = async () => {
        await axios.get('/api/profile')
            .then((response) => {
                user.value = response.data;
            });
    };

    return { user, getAuthUser };
});