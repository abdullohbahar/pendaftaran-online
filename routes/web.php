<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\KritikSaranController;
use App\Http\Controllers\Admin\KuotaController;
use App\Http\Controllers\Admin\MerkController;
use App\Http\Controllers\Admin\PendaftaranController;
use App\Http\Controllers\Admin\PorfileController;
use App\Http\Controllers\Admin\RegulasiController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CariDatakendaraanController;
use App\Http\Controllers\CekKuotaController;
use App\Http\Controllers\CekPendaftaranController as ControllersCekPendaftaranController;
use App\Http\Controllers\CekTarifController;
use App\Http\Controllers\CekTipeController;
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
Route::post('/simpan-kritik-dan-saran', [KritikDanSaranController::class, 'store'])->name('simpan.kritik');
Route::get('/cek-kendaraan', [CekKendaraanController::class, 'index'])->name('cek.kendaraan');
Route::get('/cek-pendaftaran', [CekPendaftaranController::class, 'index'])->name('cek.pendaftaran');

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/auth', [AuthController::class, 'authenticate'])->name('auth')->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('cek-kuota', CekKuotaController::class)->name('cek.kuota');
Route::get('cari-data-kendaraan/{nouji}', CariDatakendaraanController::class)->name('cari.data.kendaraan');
Route::get('cek-tarif/{berat}', CekTarifController::class)->name('cari.tarif');
Route::get('cek-tipe/{merk}', CekTipeController::class)->name('cek.tipe');
Route::get('request-cek-pendaftaran/{nomor}', ControllersCekPendaftaranController::class)->name('request.cek.pendaftaran');

// Pendaftaran
Route::prefix('pendaftaran')->group(function () {
    Route::get('uji-pertama', [PendaftaranUjiPertamaController::class, 'index'])->name('uji.pertama');
    Route::post('simpan-uji-pertama', [PendaftaranUjiPertamaController::class, 'store'])->name('simpan.uji.pertama');

    Route::get('uji-berkala', [PendaftaranUjiBerkalaController::class, 'index'])->name('uji.berkala');
    Route::post('simpan-uji-berkala', [PendaftaranUjiBerkalaController::class, 'store'])->name('simpan.uji.berkala');

    Route::get('numpang-uji-masuk', [PendaftaranNumpangUjiMasukController::class, 'index'])->name('numpang.uji.masuk');
    Route::post('simpan-numpang-uji-masuk', [PendaftaranNumpangUjiMasukController::class, 'store'])->name('simpan.numpang.uji.masuk');

    Route::get('mutasi-masuk', [PendaftaranMutasiMasuk::class, 'index'])->name('mutasi.masuk');
    Route::post('simpan-mutasi-masuk', [PendaftaranMutasiMasuk::class, 'store'])->name('simpan.mutasi.masuk');

    Route::get('bukti-pendaftaran/{id}', [PendaftaranUjiPertamaController::class, 'buktiPendaftaran'])->name('bukti.pendaftaran');
    Route::get('bukti-pdf-pendaftaran/{id}', [PendaftaranUjiPertamaController::class, 'buktiPDF'])->name('bukti.pendaftaran.pdf');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');

    Route::prefix('slider')->group(function () {
        Route::get('/', [SliderController::class, 'index'])->name('admin.slider');
        Route::get('/tambah', [SliderController::class, 'create'])->name('admin.tambah.slider');
        Route::post('/simpan', [SliderController::class, 'store'])->name('admin.simpan.slider');
        Route::delete('/hapus/{id}', [SliderController::class, 'destroy'])->name('admin.hapus.slider');
    });

    Route::prefix('regulasi')->group(function () {
        Route::get('/', [RegulasiController::class, 'index'])->name('admin.regulasi');
        Route::get('/tambah', [RegulasiController::class, 'create'])->name('admin.tambah.regulasi');
        Route::post('/simpan', [RegulasiController::class, 'store'])->name('admin.simpan.regulasi');
        Route::get('/ubah/{id}', [RegulasiController::class, 'edit'])->name('admin.ubah.regulasi');
        Route::put('/update/{id}', [RegulasiController::class, 'update'])->name('admin.update.regulasi');
        Route::delete('/hapus/{id}', [RegulasiController::class, 'destroy'])->name('admin.hapus.regulasi');
    });

    Route::prefix('kuota')->group(function () {
        Route::get('/', [KuotaController::class, 'index'])->name('admin.kuota');
        Route::get('/tambah', [KuotaController::class, 'create'])->name('admin.tambah.kuota');
        Route::post('/simpan', [KuotaController::class, 'store'])->name('admin.simpan.kuota');
        Route::get('/ubah/{id}', [KuotaController::class, 'edit'])->name('admin.ubah.kuota');
        Route::put('/update/{id}', [KuotaController::class, 'update'])->name('admin.update.kuota');
        Route::delete('/hapus/{id}', [KuotaController::class, 'destroy'])->name('admin.hapus.kuota');
    });

    Route::prefix('merek')->group(function () {
        Route::get('/', [MerkController::class, 'index'])->name('admin.merek');
        Route::get('/tambah', [MerkController::class, 'create'])->name('admin.tambah.merek');
        Route::post('/simpan', [MerkController::class, 'store'])->name('admin.simpan.merek');
        Route::get('/ubah/{id}', [MerkController::class, 'edit'])->name('admin.ubah.merek');
        Route::put('/update/{id}', [MerkController::class, 'update'])->name('admin.update.merek');
        Route::delete('/hapus/{id}', [MerkController::class, 'destroy'])->name('admin.hapus.merek');
    });

    Route::prefix('pendaftaran')->group(function () {
        Route::get('/', [PendaftaranController::class, 'index'])->name('admin.pendaftaran');
    });

    Route::prefix('kritik-saran')->group(function () {
        Route::get('/', [KritikSaranController::class, 'index'])->name('admin.kritik.saran');
    });

    Route::prefix('profile')->group(function () {
        Route::get('/', [PorfileController::class, 'index'])->name('profile');
        Route::put('/update-profile/{id}', [PorfileController::class, 'update'])->name('update.profile');
    });
});
