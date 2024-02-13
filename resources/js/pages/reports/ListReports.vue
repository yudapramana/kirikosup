<script setup>
import axios from "axios";
import { ref, onMounted, reactive, watch, toDisplayString } from "vue";
import { formatDate, formatDateString } from '../../helper.js';
import { Bootstrap4Pagination } from 'laravel-vue-pagination';
import Swal from 'sweetalert2';



const reports = ref({ 'data': [] });

const getReports = (page = 1) => {
    axios.get(`/api/reports?page=${page}`)
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

onMounted(() => {
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
                                    Tambah Laporan Baru
                                </button>
                            </router-link>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary">
                                <span class="mr-1">All</span>
                                <span class="badge badge-pill badge-info">1</span>
                            </button>

                            <button type="button" class="btn btn-default">
                                <span class="mr-1">Scheduled</span>
                                <span class="badge badge-pill badge-primary">0</span>
                            </button>

                            <button type="button" class="btn btn-default">
                                <span class="mr-1">Closed</span>
                                <span class="badge badge-pill badge-success">1</span>
                            </button>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
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
                                <tbody v-if="reports.data.length > 0">


                                    <template v-for="(report, index) in reports.data">
                                        <template v-if="report.works.length > 0">

                                            <tr v-for="(work, iSub) in report.works" :key="work.id">
                                                <td v-if="iSub === 0" :rowspan="report.works.length" class="s" style="white-space: pre;">
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
                                                     <a href="#" @click.prevent="$event => deleteReport(index, report.id)">
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

                                <tbody v-if="reports.data.length === 0">
                                    <tr>
                                        <td colspan="7" class="text-center">No results found...</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <Bootstrap4Pagination :data="reports" @pagination-change-page="getReports" :limit="1"
                        :keepLength="true" />
                </div>
            </div>
        </div>
    </div>
</template>