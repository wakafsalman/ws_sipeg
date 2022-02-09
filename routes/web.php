<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WsSipegController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\RoleController;


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
Route::get('/beranda', [WsSipegController::class, 'beranda'])->middleware('auth');
Route::post('/proses_login', [WsSipegController::class, 'proses_login'])->name('proses_login')->middleware('auth');
Route::get('/logout', [WsSipegController::class, 'logout'])->middleware('auth');
Route::get('/daftar', [WsSipegController::class, 'daftar'])->name('daftar')->middleware('auth');
Route::post('/proses_daftar', [WsSipegController::class, 'proses_daftar'])->name('proses_daftar')->middleware('auth');

//Karyawan
Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai')->middleware('auth');
Route::get('/tambah_pegawai', [PegawaiController::class, 'tambah_pegawai'])->name('tambah_pegawai')->middleware('auth');
Route::post('/proses_tambah_pegawai', [PegawaiController::class, 'proses_tambah_pegawai'])->name('proses_tambah_pegawai')->middleware('auth');
Route::get('/rubah_pegawai/{id}', [PegawaiController::class, 'rubah_pegawai'])->name('rubah_pegawai')->middleware('auth');
Route::post('/proses_rubah_pegawai/{id}', [PegawaiController::class, 'proses_rubah_pegawai'])->name('proses_rubah_pegawai')->middleware('auth');
Route::get('/hapus_pegawai/{id}', [PegawaiController::class, 'hapus_pegawai'])->name('hapus_pegawai')->middleware('auth');
Route::get('/eksport_pdf', [PegawaiController::class, 'eksport_pdf'])->name('eksport_pdf')->middleware('auth');

//User
Route::get('/user', [UserController::class, 'index'])->name('user')->middleware('auth');
Route::get('/tambah_user', [UserController::class, 'tambah_user'])->name('tambah_user')->middleware('auth');
Route::post('/proses_tambah_user', [UserController::class, 'proses_tambah_user'])->name('proses_tambah_user')->middleware('auth');
Route::get('/rubah_user/{id}', [UserController::class, 'rubah_user'])->name('rubah_user')->middleware('auth');
Route::post('/proses_rubah_user/{id}', [UserController::class, 'proses_rubah_user'])->name('proses_rubah_user')->middleware('auth');
Route::get('/hapus_user/{id}', [UserController::class, 'hapus_user'])->name('hapus_user')->middleware('auth');

//Divisi
Route::get('/divisi', [DivisiController::class, 'index'])->name('divisi')->middleware('auth');
Route::get('/tambah_divisi', [DivisiController::class, 'tambah_divisi'])->name('tambah_divisi')->middleware('auth');
Route::post('/proses_tambah_divisi', [DivisiController::class, 'proses_tambah_divisi'])->name('proses_tambah_divisi')->middleware('auth');
Route::get('/rubah_divisi/{id}', [DivisiController::class, 'rubah_divisi'])->name('rubah_divisi')->middleware('auth');
Route::post('/proses_rubah_divisi/{id}', [DivisiController::class, 'proses_rubah_divisi'])->name('proses_rubah_divisi')->middleware('auth');
Route::get('/hapus_divisi/{id}', [DivisiController::class, 'hapus_divisi'])->name('hapus_divisi')->middleware('auth');

//Jabatan
Route::get('/jabatan', [JabatanController::class, 'index'])->name('jabatan')->middleware('auth');
Route::get('/tambah_jabatan', [JabatanController::class, 'tambah_jabatan'])->name('tambah_jabatan')->middleware('auth');
Route::post('/proses_tambah_jabatan', [JabatanController::class, 'proses_tambah_jabatan'])->name('proses_tambah_jabatan')->middleware('auth');
Route::get('/rubah_jabatan/{id}', [JabatanController::class, 'rubah_jabatan'])->name('rubah_jabatan')->middleware('auth');
Route::post('/proses_rubah_jabatan/{id}', [JabatanController::class, 'proses_rubah_jabatan'])->name('proses_rubah_jabatan')->middleware('auth');
Route::get('/hapus_jabatan/{id}', [JabatanController::class, 'hapus_jabatan'])->name('hapus_jabatan')->middleware('auth');

//Role User
Route::get('/role_user', [RoleController::class, 'index'])->name('role_user')->middleware('auth');
Route::get('/tambah_role_user', [RoleController::class, 'tambah_role_user'])->name('tambah_role_user')->middleware('auth');
Route::post('/proses_tambah_role_user', [RoleController::class, 'proses_tambah_role_user'])->name('proses_tambah_role_user')->middleware('auth');
Route::get('/rubah_role_user/{id}', [RoleController::class, 'rubah_role_user'])->name('rubah_role_user')->middleware('auth');
Route::post('/proses_rubah_role_user/{id}', [RoleController::class, 'proses_rubah_role_user'])->name('proses_rubah_role_user')->middleware('auth');
Route::get('/hapus_role_user/{id}', [RoleController::class, 'hapus_role_user'])->name('hapus_role_user')->middleware('auth');

//Absensi
Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi')->middleware('auth');
Route::get('/absen', [AbsensiController::class, 'absen'])->name('absen')->middleware('auth');

//PDF

//Excel

/*Pegawai*/
Route::get('/eksport_pegawai', [PegawaiController::class, 'eksport_pegawai'])->name('eksport_pegawai');
Route::post('/import_pegawai', [PegawaiController::class, 'import_pegawai'])->name('import_pegawai');
/*User*/
Route::get('/eksport_user', [UserController::class, 'eksport_user'])->name('eksport_user');
Route::post('/import_user', [UserController::class, 'import_user'])->name('import_user');
/*Divisi*/
Route::get('/eksport_divisi', [DivisiController::class, 'eksport_divisi'])->name('eksport_divisi');
Route::post('/import_divisi', [DivisiController::class, 'import_divisi'])->name('import_divisi');
/*Jabatan*/
Route::get('/eksport_jabatan', [JabatanController::class, 'eksport_jabatan'])->name('eksport_jabatan');
Route::post('/import_jabatan', [JabatanController::class, 'import_jabatan'])->name('import_jabatan');
/*Role User*/
Route::get('/eksport_role_user', [RoleController::class, 'eksport_role_user'])->name('eksport_role_user');
Route::post('/import_role_user', [RoleController::class, 'import_role_user'])->name('import_role_user');
