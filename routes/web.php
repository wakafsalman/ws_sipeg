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
Route::get('/', [WsSipegController::class, 'index']);
//Karyawan
Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
Route::get('/tambah_pegawai', [PegawaiController::class, 'tambah_pegawai'])->name('tambah_pegawai');
Route::post('/proses_tambah_pegawai', [PegawaiController::class, 'proses_tambah_pegawai'])->name('proses_tambah_pegawai');
Route::get('/rubah_pegawai/{id}', [PegawaiController::class, 'rubah_pegawai'])->name('rubah_pegawai');
Route::post('/proses_rubah_pegawai/{id}', [PegawaiController::class, 'proses_rubah_pegawai'])->name('proses_rubah_pegawai');
Route::get('/hapus_pegawai/{id}', [PegawaiController::class, 'hapus_pegawai'])->name('hapus_pegawai');

//PDF
Route::get('/eksport_pdf', [PegawaiController::class, 'eksport_pdf'])->name('eksport_pdf');

//Excel
Route::get('/eksport_excel', [PegawaiController::class, 'eksport_excel'])->name('eksport_excel');
Route::post('/import_excel', [PegawaiController::class, 'import_excel'])->name('import_excel');
