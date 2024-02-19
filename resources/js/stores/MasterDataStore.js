import axios from 'axios';
import { defineStore } from 'pinia';
import { ref } from 'vue';
import { useLoadingStore } from "./LoadingStore";
import { useMonthYearStore } from "./MonthYearStore.js";
import { useStorage } from '@vueuse/core';


export const useMasterDataStore = defineStore('MasterDataStore', () => {
    const orgId = useStorage('MasterDataStore:orgId', ref(''));
    const userId = useStorage('MasterDataStore:userId', ref(''));

    const orgList = useStorage('MasterDataStore:orgList', ref([]));
    const userList = useStorage('MasterDataStore:userList', ref({}));


    const loadingStore = useLoadingStore();

    const getOrgList = async () => {
        loadingStore.toggleLoading();
        await axios.get('/api/master', {
            params: {
                type: 'orgs',
            }
        })
            .then((response) => {
                orgList.value = response.data.data;
                loadingStore.toggleLoading();
            });
    };

    const getUserList = async (org) => {
        console.log('orgId');
        console.log(org);

        loadingStore.toggleLoading();
        await axios.get('/api/master', {
            params: {
                type: 'users',
                id: org.id
            }
        })
            .then((response) => {
                userList.value = response.data.data;
                loadingStore.toggleLoading();
            });
    };

    const getUserListbyOrgID = async (orgId) => {
        console.log('orgId');

        loadingStore.toggleLoading();
        await axios.get('/api/master', {
            params: {
                type: 'users',
                id: orgId
            }
        })
            .then((response) => {
                userList.value = response.data.data;
                loadingStore.toggleLoading();
            });
    };

    return { orgId, userId,  orgList, userList, getOrgList, getUserList, getUserListbyOrgID };
});