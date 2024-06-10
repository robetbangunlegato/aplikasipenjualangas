<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsipNotaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardAplikasiController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('dashboard', DashboardController::class);
Route::resource('arsipnota', ArsipNotaController::class);
Route::get('/cari', [ArsipNotaController::class, 'getDataFilter'])->name('cari');
Route::get('/download/{filename}', [ArsipNotaController::class, 'download'])->name('download');
Route::resource('dashboardaplikasi', DashboardAplikasiController::class);