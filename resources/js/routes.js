import Dashboard from './components/Dashboard.vue';
import ListReports from './pages/reports/ListReports.vue';
import ReportForm from './pages/reports/ReportForm.vue';
import UserList from './pages/users/UserList.vue';
import UpdateSetting from './pages/settings/UpdateSetting.vue';
import UpdateProfile from './pages/profile/UpdateProfile.vue';
import Login from './pages/auth/Login.vue';
import OrganizationList from './pages/orgs/OrgList.vue';

export default[
    {
        path: '/login',
        name: 'admin.login',
        component: Login,
    },
    {
        path: '/admin/dashboard',
        name: 'admin.dashboard',
        component: Dashboard,
    },
    {
        path: '/admin/reports',
        name: 'admin.reports',
        component: ListReports,
    },
    {
        path: '/admin/reports/create',
        name: 'admin.reports.create',
        component: ReportForm,
    },
    {
        path: '/admin/reports/:id/edit',
        name: 'admin.reports.edit',
        component: ReportForm,
    },
    {
        path: '/admin/organizations',
        name: 'admin.organizations',
        component: OrganizationList,
    },
    {
        path: '/admin/users',
        name: 'admin.users',
        component: UserList,
    },
    {
        path: '/admin/settings',
        name: 'admin.settings',
        component: UpdateSetting,
    },
    
    {
        path: '/admin/profile',
        name: 'admin.profile',
        component: UpdateProfile,
    },
   
]