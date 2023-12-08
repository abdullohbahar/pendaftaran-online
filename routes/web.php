<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Guest\CekKendaraanController;
use App\Http\Controllers\Guest\CekPendaftaranController;
use App\Http\Controllers\Guest\KritikDanSaranController;
use App\Http\Controllers\Guest\LandingController;
use App\Http\Controllers\Guest\PendaftaranMutasiMasuk;
use App\Http\Controllers\Guest\PendaftaranNumpangUjiMasukController;
use App\Http\Controllers\Guest\PendaftaranUjiBerkalaController;
use App\Http\Controllers\Guest\PendaftaranUjiPertamaController;
use App\Http\Controllers\Guest\RegistrationController;
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

Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/regulasi', [LandingController::class, 'regulation'])->name('regulation');
Route::get('/pendaftaran', [RegistrationController::class, 'index'])->name('registration');
Route::get('/kritik-dan-saran', [KritikDanSaranController::class, 'index'])->name('kritik');
Route::get('/cek-kendaraan', [CekKendaraanController::class, 'index'])->name('cek.kendaraan');
Route::get('/cek-pendaftaran', [CekPendaftaranController::class, 'index'])->name('cek.pendaftaran');

Route::get('/admin/login', [AuthController::class, 'index'])->name('login');
Route::post('/auth', [AuthController::class, 'authenticate'])->name('auth');

Route::prefix('pendaftaran')->group(function () {
    Route::get('uji-pertama', [PendaftaranUjiPertamaController::class, 'index'])->name('uji.pertama');
    Route::get('uji-berkala', [PendaftaranUjiBerkalaController::class, 'index'])->name('uji.berkala');
    Route::get('numpang-uji-masuk', [PendaftaranNumpangUjiMasukController::class, 'index'])->name('numpang.uji.masuk');
    Route::get('mutasi-masuk', [PendaftaranMutasiMasuk::class, 'index'])->name('mutasi.masuk');
});

Route::prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');

    Route::prefix('slider')->group(function () {
        Route::get('/', [SliderController::class, 'index'])->name('admin.slider');
        Route::get('/tambah', [SliderController::class, 'create'])->name('admin.tambah.slider');
        Route::post('/simpan', [SliderController::class, 'store'])->name('admin.simpan.slider');
        Route::delete('/hapus/{id}', [SliderController::class, 'destroy'])->name('admin.hapus.slider');
    });
});
