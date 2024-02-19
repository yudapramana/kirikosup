import axios from 'axios';
import { defineStore } from 'pinia';
import { ref } from 'vue';
import moment from 'moment';
import { useStorage } from '@vueuse/core';




export const useMonthYearStore = defineStore('MonthYearStore', () => {
    const mySelected = useStorage('SettingStore:mySelected', ref(''));

    const setMonthYear = () => {
        mySelected.value = moment().format('YYYY-MM');
    };

    return { mySelected, setMonthYear };
});