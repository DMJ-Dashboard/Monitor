<?php

use App\Http\Controllers\DashboardDMJ;
use App\Http\Controllers\DashboardDMJBTASController;
use App\Http\Controllers\DashboardIKABDGController;
use App\Http\Controllers\DashboardIKAController;
use App\Http\Controllers\Maintanance;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(DashboardDMJ::class)->group(function () {
    Route::get('/dashboard_DMJ', 'dashboarddmj')->name('DMJS');
    Route::get('/dashboard_IKA', 'dashboardika')->name('IKA');
    Route::get('/', 'dashboarddmj')->name('DMJS');
    Route::post('/filter', 'carimonthly')->name('filltermonthly');
    Route::get('/filters', 'carimonthly')->name('filltermonthlyS');
    Route::post('/tambah_target', 'createtarget')->name('Tambah Target');
});
Route::controller(DashboardIKAController::class)->group(function () {
    Route::get('/dashboard_IKA', 'dashboardika')->name('IKA');
    Route::get('/showpjp_IKA/{nobukti}', 'show')->name('showpjp');
});
Route::controller(DashboardIKABDGController::class)->group(function () {
    Route::get('/dashboard_IKABDG', 'dashboardikabdg')->name('IKABDG');
});
Route::controller(DashboardDMJBTASController::class)->group(function () {
    Route::get('/dashboard_DMJBTA', 'dashboarddmjbta')->name('DMJBTA');
});
Route::controller(ReportController::class)->group(function () {
    Route::get('/report', 'report')->name('Report');
});

Route::controller(Maintanance::class)->group(function () {
    // Route::get('/', 'maintanance')->name('services');
    Route::get('/maintanance', 'maintanance')->name('services');

    // Route::get('/dashboard_DMJ', 'maintanance')->name('services');
    // Route::get('/dashboard_IKA', 'maintanance')->name('services');
    // Route::get('/', 'maintanance')->name('services');
    // Route::post('/filter', 'maintanance')->name('services');
    // Route::get('/filters', 'maintanance')->name('services');
    // Route::post('/tambah_target', 'maintanance')->name('services');

    // Route::get('/dashboard_IKA', 'maintanance')->name('services');
    // Route::get('/dashboard_IKABDG', 'maintanance')->name('services');
    // Route::get('/dashboard_DMJBTA', 'maintanance')->name('services');
});

