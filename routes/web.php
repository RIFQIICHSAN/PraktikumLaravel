<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\SocialAuthFacebookControll;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/mahasiswa', [App\Http\Controllers\MahasiswaController::class, 'index'])->name('mahasiswa');

Route::get('/mahasiswa/cari', [MahasiswaController::class, 'cari']);

Route::get('/pegawai/cari', [PegawaiController::class, 'cari']);

Route::post('/mahasiswa', [MahasiswaController::class, 'create'])->name('add.mhs');

Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit']);

Route::post('/mahasiswa/{id}/update', [MahasiswaController::class, 'update'])->name('update.mhs');

Route::get('/mahasiswa/delete/{id}', [MahasiswaController::class, 'delete']);

Route::get('/mahasiswa/exportpdf', [MahasiswaController::class, 'exportPdf']);

Route::get('/pegawai',[PegawaiController::class, 'index']);

Route::get('auth/google', [App\Http\Controllers\GoogleController::class, 'redirectToGoogle']);

Route::get('auth/google/callback', [App\Http\Controllers\GoogleController::class, 'handleGoogleCallback']);

Route::get('auth/facebook', [SocialAuthFacebookControll::class, 'redirectToFacebook']);

Route::get('auth/facebook/callback', [SocialAuthFacebookControll::class, 'handleFacebookCallback']);