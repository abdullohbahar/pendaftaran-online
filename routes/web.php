<?php

use App\Http\Controllers\Guest\LandingController;
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
