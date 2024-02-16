<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\Admin\PrintController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/print-lckb/{monthYear}', [PrintController::class, 'document']);



Route::get('/', function () {
    return redirect('/login');
});

Route::get('/get-password', function () {
    return bcrypt('12345678');
});

Route::middleware('auth')->group(function() {
    Route::get('/api/stats/all', [DashboardController::class, 'all']);

    Route::get('/api/stats/reports', [DashboardController::class, 'reports']);
    Route::get('/api/fusers', [UserController::class, 'fetch']);

    Route::get('/api/fetch-orgs', [OrganizationController::class, 'fetch']);
    Route::get('/api/orgs', [OrganizationController::class, 'index']);
    Route::post('api/orgs', [OrganizationController::class, 'store']);
    Route::put('api/orgs/{org}', [OrganizationController::class, 'update']);
    Route::delete('/api/orgs/{org}', [OrganizationController::class, 'destroy']);
    Route::delete('/api/orgs', [OrganizationController::class, 'bulkDelete']);


    Route::get('/api/users', [UserController::class, 'index']);
    Route::post('api/users', [UserController::class, 'store']);
    Route::put('api/users/{user}', [UserController::class, 'update']);
    Route::delete('/api/users/{user}', [UserController::class, 'destroy']);
    Route::patch('/api/users/{user}/change-role', [UserController::class, 'changeRole']);
    Route::delete('/api/users', [UserController::class, 'bulkDelete']);
    
    Route::get('/api/reports', [ReportController::class, 'index']);
    Route::post('/api/reports/create', [ReportController::class, 'store']);
    Route::get('/api/reports/{work}/edit', [ReportController::class, 'edit']);
    Route::put('/api/reports/{work}/edit', [ReportController::class, 'update']);
    Route::delete('/api/reports/{work}', [ReportController::class, 'destroy']);

    Route::delete('/api/parent-reports/{report}', [ReportController::class, 'destroyParent']);


    Route::get('/api/settings', [SettingController::class, 'index']);
    Route::post('/api/settings', [SettingController::class, 'update']);

    Route::get('/api/profile', [ProfileController::class, 'index']);
    Route::put('/api/profile', [ProfileController::class, 'update']);
    Route::post('/api/upload-profile-image', [ProfileController::class, 'uploadImage']);
    Route::post('/api/change-user-password', [ProfileController::class, 'changePassword']);
});

Route::get('{view}', ApplicationController::class)->where('view', '(.*)')->middleware('auth');