<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WsSipegController;
use App\Http\Controllers\PegawaiController;

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

//Wakaf Salman SIPEG
Route::get('/', [WsSipegController::class, 'index'])->name('login');
Route::get('/beranda', [WsSipegController::class, 'beranda']);
Route::post('/proses_login', [WsSipegController::class, 'proses_login'])->name('proses_login');
Route::get('/logout', [WsSipegController::class, 'logout']);
Route::get('/daftar', [WsSipegController::class, 'daftar'])->name('daftar');
Route::post('/proses_daftar', [WsSipegController::class, 'proses_daftar'])->name('proses_daftar');

//Karyawan
Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai')->middleware('auth');
Route::get('/tambah_pegawai', [PegawaiController::class, 'tambah_pegawai'])->name('tambah_pegawai')->middleware('auth');
Route::post('/proses_tambah_pegawai', [PegawaiController::class, 'proses_tambah_pegawai'])->name('proses_tambah_pegawai')->middleware('auth');
Route::get('/rubah_pegawai/{id}', [PegawaiController::class, 'rubah_pegawai'])->name('rubah_pegawai')->middleware('auth');
Route::post('/proses_rubah_pegawai/{id}', [PegawaiController::class, 'proses_rubah_pegawai'])->name('proses_rubah_pegawai')->middleware('auth');
Route::get('/hapus_pegawai/{id}', [PegawaiController::class, 'hapus_pegawai'])->name('hapus_pegawai')->middleware('auth');

//PDF
Route::get('/eksport_pdf', [PegawaiController::class, 'eksport_pdf'])->name('eksport_pdf');

//Excel
Route::get('/eksport_excel', [PegawaiController::class, 'eksport_excel'])->name('eksport_excel');
Route::post('/import_excel', [PegawaiController::class, 'import_excel'])->name('import_excel');
