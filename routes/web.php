<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Guest\KritikDanSaranController;
use App\Http\Controllers\Guest\LandingController;
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
Route::get('/admin/login', [AuthController::class, 'index'])->name('login');
Route::post('/auth', [AuthController::class, 'authenticate'])->name('auth');

Route::prefix('pendaftaran')->group(function () {
    Route::get('uji-pertama', [PendaftaranUjiPertamaController::class, 'index']);
});
