<script setup>
import axios from "axios";
import { ref, onMounted, reactive, watch, toDisplayString } from "vue";
import { formatDate, formatDateString } from '../../helper.js';
import { Bootstrap4Pagination } from 'laravel-vue-pagination';
import Swal from 'sweetalert2';
import moment from 'moment';
import { useStorage } from '@vueuse/core';
import { useAuthUserStore } from "../../stores/AuthUserStore.js";

const authUserStore = useAuthUserStore();

const reports = ref({ 'data': [] });

const getReports = (page = 1) => {
    axios.get(`/api/reports?monthyear=${mySelected.value}&page=${page}`)
        .then((response) => {
            console.log(response.data);
            reports.value = response.data;
        });
};

const deleteWork = (report_x, work_id) => {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete(`/api/reports/${work_id}`)
                .then((response) => {
                    reports.value.data[report_x].works = reports.value.data[report_x].works.filter(work => work.id !== work_id);
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                });
        }
    });
};

const deleteReport = (report_x, report_id) => {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete(`/api/parent-reports/${report_id}`)
                .then((response) => {
                    reports.value.data = reports.value.data.filter(report => report.id !== report_id);
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                });
        }
    });
};


const mySelected = useStorage('SettingStore:mySelected', ref(''));

const myOptions = ref([
    {
        text: moment().subtract(2, 'months').format('MMMM  YYYY'),
        id: moment().subtract(2, 'months').format('YYYY-MM')
    },
    {
        text: moment().subtract(1, 'months').format('MMMM  YYYY'),
        id: moment().subtract(1, 'months').format('YYYY-MM')
    },
    {
        text: moment().format('MMMM  YYYY'),
        id: moment().format('YYYY-MM')
    },
]);

const myChangeEvent = () => {
    console.log(mySelected.value);
    getReports();
};

const printLCKB = () => {
    // window.location = '/print-lckb/' + mySelected.value;
    if (!authUserStore.user.nama_pemeriksa) {
        alert('Nama dan NIP pemeriksa belum diisi!. Harap diisi di profil!');
    } else if(!mySelected.value) {
        alert('Pilih bulan dan tahun terlebih dahulu!');
    }else {
        window.open('/print-lckb/' + mySelected.value, '_blank');
    }
}

onMounted(() => {
    console.log(mySelected.value);
    getReports();
});
</script>

<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan Kerja</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Kerja</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between mb-2">
                        <div>
                            <router-link to="/admin/reports/create">
                                <button class="btn btn-primary">
                                    <i class="fa fa-plus-circle mr-1"></i>
                                    Tambah
                                </button>
                            </router-link>

                        </div>
                        <div class="btn-group">

                            <button @click="printLCKB()" type="button" class="btn btn-secondary">
                                <span class="mr-1">Print</span>
                            </button>

                            <select v-model="mySelected" class="custom-select rounded-0" @change="myChangeEvent()">
                                <option v-for="opt in myOptions" :value="opt.id" :key="opt.id">{{ opt.text }}</option>
                            </select>


                            <!-- <Select2 v-model="monthYear" :options="myOptions" @change="myChangeEvent" class="custom-select rounded-0"
                                @select="mySelectEvent"  
                                :settings="{
                                    selectionCssClass : 'custom-select rounded-0'
                                }" /> -->


                        </div>


                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col" class="text-center">#</th>
                                            <th scope="col">Pekerjaan</th>
                                            <!-- <th scope="col">Detil Kerja</th> -->
                                            <th scope="col" class="text-right">Vol</th>
                                            <th scope="col">Unit</th>
                                            <th scope="col">Eviden</th>
                                            <th scope="col">Options</th>

                                        </tr>
                                    </thead>
                                    <tbody v-if="reports.data?.length > 0">


                                        <template v-for="(report, index) in reports.data">
                                            <template v-if="report.works.length > 0">

                                                <tr v-for="(work, iSub) in report.works" :key="work.id">
                                                    <td v-if="iSub === 0" :rowspan="report.works.length" class="s"
                                                        style="white-space: pre;">
                                                        {{ formatDateString(report.date) }}</td>
                                                    <td class="text-center">{{ iSub + 1 }}</td>
                                                    <td class="s">
                                                        {{ work.work_name }} <br>
                                                        <p class="text-muted m-0 p-0" style="font-size: small !important;">
                                                            {{
                                                                work.work_detail }}</p>
                                                    </td>
                                                    <!-- <td class="s">{{ work.work_detail }}</td> -->
                                                    <td class="s text-right">{{ work.volume }}</td>
                                                    <td class="s">{{ work.unit }}</td>
                                                    <td class="s">{{ work.evidence }}</td>
                                                    <td class="text-center">
                                                        <router-link :to="`/admin/reports/${work.id}/edit`">
                                                            <i class="fa fa-edit"></i>
                                                        </router-link>
                                                        <a href="#" @click.prevent="$event => deleteWork(index, work.id)">
                                                            <i class="fa fa-trash text-danger ml-2"></i>
                                                        </a>
                                                    </td>


                                                </tr>
                                            </template>

                                            <template v-else>
                                                <tr :key="report.id">
                                                    <td class="s">{{
                                                        formatDateString(report.date) }}
                                                    </td>
                                                    <td class="s text-center">
                                                        <a href="#"
                                                            @click.prevent="$event => deleteReport(index, report.id)">
                                                            <i class="fa fa-trash text-danger"></i>
                                                        </a>
                                                    </td>
                                                    <td colspan="7" class="text-center">Belum ada data...</td>
                                                </tr>
                                            </template>

                                        </template>



                                        <!-- <template v-for="item in items">
                                        <tr v-for="(subitem, iSub) in item.sub" :key="subitem.id">
                                            <td>{{ subitem.date }}</td>
                                            <td v-if="iSub === 0" :rowspan="item.sub.length" class="s">{{ item.name }}</td>
                                        </tr>
                                    </template> -->
                                    </tbody>

                                    <tbody v-if="reports.data?.length === 0">
                                        <tr>
                                            <td colspan="7" class="text-center">Tidak ada hasil, silahkan pilih bulan...
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <Bootstrap4Pagination :data="reports" @pagination-change-page="getReports" :limit="1"
                        :keepLength="true" />
                </div>
            </div>
        </div>
    </div>
</template>