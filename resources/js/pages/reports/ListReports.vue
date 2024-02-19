<script setup>
import axios from "axios";
import { ref, onMounted, reactive, watch, toDisplayString } from "vue";
import { formatDate, formatDateString, formatDateStringHuman } from '../../helper.js';
import { Bootstrap4Pagination } from 'laravel-vue-pagination';
import Swal from 'sweetalert2';
import moment from 'moment';
import { useStorage } from '@vueuse/core';
import { useAuthUserStore } from "../../stores/AuthUserStore.js";
import { useLoadingStore } from "../../stores/LoadingStore.js";

const loadingStore = useLoadingStore();
const authUserStore = useAuthUserStore();
const reports = ref({ 'data': [] });
const thisHeight = ref(0);
const thisWidth = ref(0);
const isMobile = ref(false);


const getReports = (page = 1) => {
    loadingStore.toggleLoading();
    axios.get(`/api/reports?monthyear=${mySelected.value}&page=${page}`)
        .then((response) => {
            console.log(response.data);
            reports.value = response.data;
            loadingStore.toggleLoading();
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
    } else if (!mySelected.value) {
        alert('Pilih bulan dan tahun terlebih dahulu!');
    } else {
        window.open('/print-lckb/' + mySelected.value, '_blank');
    }
}


const checkIsMobile = () => {
    // var check = false;
    // (function (a) { if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) check = true; })(navigator.userAgent || navigator.vendor || window.opera);
    // return check;

    if (screen.width <= 760) {
        return true
    } else {
        return false
    }
};

const getDimensions = () => {
    thisWidth.value = document.documentElement.clientWidth;
    thisHeight.value = document.documentElement.clientHeight;
    isMobile.value = checkIsMobile();

    console.log('isMobile');
    console.log(isMobile.value);

}

onMounted(() => {
    console.log(mySelected.value);
    getReports();

    isMobile.value = checkIsMobile();
    window.addEventListener('resize', getDimensions);
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

                    <div class="timeline" v-if="isMobile">
                        <template v-for="report in reports.data" :key="report.id">
                            <template v-for="work in report.works" :key="work.id">
                                <div>
                                    <div class="timeline-item">
                                        <span class="time"> <router-link :to="`/admin/reports/${work.id}/edit`"
                                                class="badge badge-info right" style="margin-right: 5px;"> Edit
                                            </router-link>
                                            <a class="badge badge-danger right" href="#"
                                                @click.prevent="$event => deleteWork(index, work.id)">
                                                Delete
                                            </a></span>
                                        <h3 class="timeline-header"> <span class="time"><i class="fas fa-clock"></i> {{
                                            formatDateStringHuman(report.date) }}</span></h3>
                                        <div class="timeline-body">
                                            [{{ work.volume }} {{ work.unit }}] {{ work.work_name }}<br>
                                            <span style="font-size: smaller;">
                                                {{ work.work_detail }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </template>

                    </div>


                    <div class="card" v-if="!isMobile">
                        <div class="card-body">
                            <div class="table-responsive overlay-wrapper">
                                <div v-if="loadingStore.isLoading" class="overlay"><i
                                        class="fas fa-3x fa-sync-alt fa-spin"></i>
                                    <div class="text-bold pt-2">Loading...</div>
                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col" class="text-center">#</th>
                                            <th scope="col" width="50%">Pekerjaan</th>
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


<style>
.select2-selection {
    height: auto !important;
}

.timeline::before {
    border-radius: 0 !important;
    background-color: transparent !important;
    bottom: 0;
    content: "";
    left: 0 !important;
    margin: 0;
}

.timeline>div>.timeline-item {
    margin-left: 0 !important;
    margin-right: 0 !important;
}

.timeline>div {
    margin-bottom: 15px;
    margin-right: 0 !important;
}
</style>