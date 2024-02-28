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
        print_layout: '',
        jabatan: '',
        org_name: '',
        org_id: '',
    }));
    
    const getAuthUser = async () => {
        await axios.get('/api/profile')
            .then((response) => {
                user.value = response.data;
            })
            .catch((error) => {
                console.log(error.response.data)
                if (error.response.status === 401) {
                    authUserStore.user.name = '';
                    router.push('/login');
                    localStorage.clear();
    
                }
            });
    };

    return { user, getAuthUser };
});