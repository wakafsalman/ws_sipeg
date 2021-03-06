<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WsSipegController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ScreeningController;
use App\Http\Controllers\KpiController;
use App\Http\Controllers\KodeKpiController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\TrainingTypeController;
use App\Http\Controllers\AssetController;


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
Route::get('/profil', [WsSipegController::class, 'profil'])->name('profil');
Route::post('/rubah_profil/{id}', [WsSipegController::class, 'rubah_profil'])->name('rubah_profil');
Route::get('/reset', [WsSipegController::class, 'reset'])->name('reset');
Route::post('/reset_password', [WsSipegController::class, 'reset_password'])->name('reset_password');

//Karyawan
Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
Route::post('/tambah_pegawai', [PegawaiController::class, 'tambah_pegawai'])->name('tambah_pegawai');
Route::post('/rubah_pegawai/{id}', [PegawaiController::class, 'rubah_pegawai'])->name('rubah_pegawai');
Route::get('/hapus_pegawai/{id}', [PegawaiController::class, 'hapus_pegawai'])->name('hapus_pegawai');
Route::get('/eksport_pdf', [PegawaiController::class, 'eksport_pdf'])->name('eksport_pdf');

//User
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::post('/tambah_user', [UserController::class, 'tambah_user'])->name('tambah_user');
Route::post('/rubah_user/{id}', [UserController::class, 'rubah_user'])->name('rubah_user');
Route::get('/hapus_user/{id}', [UserController::class, 'hapus_user'])->name('hapus_user');

//Divisi
Route::get('/divisi', [DivisiController::class, 'index'])->name('divisi');
Route::post('/tambah_divisi', [DivisiController::class, 'tambah_divisi'])->name('tambah_divisi');
Route::post('/rubah_divisi/{id}', [DivisiController::class, 'rubah_divisi'])->name('rubah_divisi');
Route::get('/hapus_divisi/{id}', [DivisiController::class, 'hapus_divisi'])->name('hapus_divisi');

//Jabatan
Route::get('/jabatan', [JabatanController::class, 'index'])->name('jabatan');
Route::post('/tambah_jabatan', [JabatanController::class, 'tambah_jabatan'])->name('tambah_jabatan');
Route::post('/rubah_jabatan/{id}', [JabatanController::class, 'rubah_jabatan'])->name('rubah_jabatan');
Route::get('/hapus_jabatan/{id}', [JabatanController::class, 'hapus_jabatan'])->name('hapus_jabatan');

//Kode KPI
Route::get('/kode_kpi', [KodeKpiController::class, 'index'])->name('kode_kpi');
Route::post('/tambah_kode_kpi', [KodeKpiController::class, 'tambah_kode_kpi'])->name('tambah_kode_kpi');
Route::post('/rubah_kode_kpi/{id}', [KodeKpiController::class, 'rubah_kode_kpi'])->name('rubah_kode_kpi');
Route::get('/hapus_kode_kpi/{id}', [KodeKpiController::class, 'hapus_kode_kpi'])->name('hapus_kode_kpi');

//KPI
Route::get('/kpi', [KpiController::class, 'index'])->name('kpi');
Route::get('/input_kpi', [KpiController::class, 'input_kpi'])->name('input_kpi');
Route::post('/tambah_kpi', [KpiController::class, 'tambah_kpi'])->name('tambah_kpi');
Route::post('/rubah_kpi/{id}', [KpiController::class, 'rubah_kpi'])->name('rubah_kpi');
Route::get('/hapus_kpi/{id}', [KpiController::class, 'hapus_kpi'])->name('hapus_kpi');
Route::get('/report_kpi/{id_divisi}/{id_kode_kpi}', [KpiController::class, 'report_kpi'])->name('report_kpi');
Route::post('/tambah_report_kpi', [KpiController::class, 'tambah_report_kpi'])->name('tambah_report_kpi');
Route::post('/rubah_report_kpi/{id}', [KpiController::class, 'rubah_report_kpi'])->name('rubah_report_kpi');
Route::get('/hapus_report_kpi/{id}', [KpiController::class, 'hapus_report_kpi'])->name('hapus_report_kpi');
Route::get('/kpi_report', [KpiController::class, 'kpi_report'])->name('kpi_report');
Route::post('/rubah_report_user_kpi/{id}', [KpiController::class, 'rubah_report_user_kpi'])->name('rubah_report_user_kpi');

//Role User
Route::get('/role_user', [RoleController::class, 'index'])->name('role_user');
Route::post('/tambah_role_user', [RoleController::class, 'tambah_role_user'])->name('tambah_role_user');
Route::post('/rubah_role_user/{id}', [RoleController::class, 'rubah_role_user'])->name('rubah_role_user');
Route::get('/hapus_role_user/{id}', [RoleController::class, 'hapus_role_user'])->name('hapus_role_user');

//Absensi
Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi');
Route::get('/absen', [AbsensiController::class, 'absen'])->name('absen');
Route::post('/absen_masuk', [AbsensiController::class, 'absen_masuk'])->name('absen_masuk');
Route::post('/absen_keluar/{id}', [AbsensiController::class, 'absen_keluar'])->name('absen_keluar');
Route::post('/presensi', [AbsensiController::class, 'presensi'])->name('presensi');
Route::post('/rubah_rencana_kerja/{id}', [AbsensiController::class, 'rubah_rencana_kerja'])->name('rubah_rencana_kerja');

//Screening
Route::get('/screening', [ScreeningController::class, 'index'])->name('screening');

//Donatur
Route::get('/donatur', [DonaturController::class, 'index'])->name('donatur');
Route::post('/tambah_donatur', [DonaturController::class, 'tambah_donatur'])->name('tambah_donatur');
Route::post('/rubah_donatur/{id}', [DonaturController::class, 'rubah_donatur'])->name('rubah_donatur');
Route::get('/hapus_donatur/{id}', [DonaturController::class, 'hapus_donatur'])->name('hapus_donatur');

//Perizinan

/*Cuti*/
Route::get('/cuti', [CutiController::class, 'index'])->name('cuti');
Route::post('/input_cuti', [CutiController::class, 'input_cuti'])->name('input_cuti');
Route::get('/rekap_cuti', [CutiController::class, 'rekap_cuti'])->name('rekap_cuti');

//Training

/*Benefit*/
Route::get('/benefit', [BenefitController::class, 'index'])->name('benefit');
Route::post('/tambah_benefit', [BenefitController::class, 'tambah_benefit'])->name('tambah_benefit');
Route::post('/rubah_benefit/{id}', [BenefitController::class, 'rubah_benefit'])->name('rubah_benefit');
Route::get('/hapus_benefit/{id}', [BenefitController::class, 'hapus_benefit'])->name('hapus_benefit');

/*Jenis Training*/
Route::get('/jenis_training', [TrainingTypeController::class, 'index'])->name('jenis_training');
Route::post('/tambah_jenis_training', [TrainingTypeController::class, 'tambah_jenis_training'])->name('tambah_jenis_training');
Route::post('/rubah_jenis_training/{id}', [TrainingTypeController::class, 'rubah_jenis_training'])->name('rubah_jenis_training');
Route::post('/rubah_bonus_point/{id}', [TrainingTypeController::class, 'rubah_bonus_point'])->name('rubah_bonus_point');
Route::get('/hapus_jenis_training/{id}', [TrainingTypeController::class, 'hapus_jenis_training'])->name('hapus_jenis_training');

/*Input & Rekap*/
Route::get('/training', [TrainingController::class, 'index'])->name('training');
Route::post('/input_training', [TrainingController::class, 'input_training'])->name('input_training');
Route::post('/rubah_training/{id}', [TrainingController::class, 'rubah_training'])->name('rubah_training');
Route::get('/hapus_training/{id}', [TrainingController::class, 'hapus_training'])->name('hapus_training');
Route::get('/rekap_training', [TrainingController::class, 'rekap_training'])->name('rekap_training');
Route::get('/rekap_point', [TrainingController::class, 'rekap_point'])->name('rekap_point');
Route::get('/reset_point/{id}', [TrainingController::class, 'reset_point'])->name('reset_point');

//Asset
Route::get('/aset', [AssetController::class, 'index'])->name('aset');
Route::post('/tambah_aset', [AssetController::class, 'tambah_aset'])->name('tambah_aset');
Route::post('/rubah_aset/{id}', [AssetController::class, 'rubah_aset'])->name('rubah_aset');
Route::get('/hapus_aset/{id}', [AssetController::class, 'hapus_aset'])->name('hapus_aset');
Route::get('/autocomplete_pic_data_aset', [AssetController::class, 'autocomplete_pic_data_aset'])->name('autocomplete_pic_data_aset');
Route::get('/satuan', [AssetController::class, 'satuan'])->name('satuan');
Route::post('/tambah_satuan', [AssetController::class, 'tambah_satuan'])->name('tambah_satuan');
Route::post('/rubah_satuan/{id}', [AssetController::class, 'rubah_satuan'])->name('rubah_satuan');
Route::get('/hapus_satuan/{id}', [AssetController::class, 'hapus_satuan'])->name('hapus_satuan');
Route::get('/pic', [AssetController::class, 'pic'])->name('pic');
Route::post('/tambah_pic', [AssetController::class, 'tambah_pic'])->name('tambah_pic');
Route::post('/rubah_pic/{id}', [AssetController::class, 'rubah_pic'])->name('rubah_pic');
Route::get('/hapus_pic/{id}', [AssetController::class, 'hapus_pic'])->name('hapus_pic');
Route::get('/pengajuan', [AssetController::class, 'pengajuan'])->name('pengajuan');
Route::post('/proses_pengajuan', [AssetController::class, 'proses_pengajuan'])->name('proses_pengajuan');
Route::post('/rubah_pengajuan/{id}', [AssetController::class, 'rubah_pengajuan'])->name('rubah_pengajuan');
Route::get('/hapus_pengajuan/{id}', [AssetController::class, 'hapus_pengajuan'])->name('hapus_pengajuan');
Route::get('/setujui_pengajuan/{id}', [AssetController::class, 'setujui_pengajuan'])->name('setujui_pengajuan');
Route::get('/batalkan_pengajuan/{id}', [AssetController::class, 'batalkan_pengajuan'])->name('batalkan_pengajuan');
Route::get('/autocomplete_aset_pengajuan', [AssetController::class, 'autocomplete_aset_pengajuan'])->name('autocomplete_aset_pengajuan');
Route::get('/aset_masuk', [AssetController::class, 'aset_masuk'])->name('aset_masuk');
Route::post('/tambah_aset_masuk', [AssetController::class, 'tambah_aset_masuk'])->name('tambah_aset_masuk');
Route::post('/rubah_aset_masuk/{id}', [AssetController::class, 'rubah_aset_masuk'])->name('rubah_aset_masuk');
Route::get('/hapus_aset_masuk/{id}', [AssetController::class, 'hapus_aset_masuk'])->name('hapus_aset_masuk');
Route::get('/autocomplete_aset_masuk', [AssetController::class, 'autocomplete_aset_masuk'])->name('autocomplete_aset_masuk');
Route::get('/report_stock', [AssetController::class, 'report_stock'])->name('report_stock');
Route::post('/tambah_report_stock', [AssetController::class, 'tambah_report_stock'])->name('tambah_report_stock');
Route::post('/rubah_report_stock/{id}', [AssetController::class, 'rubah_report_stock'])->name('rubah_report_stock');
Route::get('/hapus_report_stock/{id}', [AssetController::class, 'hapus_report_stock'])->name('hapus_report_stock');
Route::get('/stock_merchandise', [AssetController::class, 'stock_merchandise'])->name('stock_merchandise');
Route::post('/kelola_limit/{id}', [AssetController::class, 'kelola_limit'])->name('kelola_limit');
Route::get('/hapus_stock_merchandise/{id}', [AssetController::class, 'hapus_stock_merchandise'])->name('hapus_stock_merchandise');
Route::get('/bast', [AssetController::class, 'bast'])->name('bast');
Route::post('/upload_bast', [AssetController::class, 'upload_bast'])->name('upload_bast');
Route::post('/rubah_bast/{id}', [AssetController::class, 'rubah_bast'])->name('rubah_bast');
Route::get('/hapus_bast/{id}', [AssetController::class, 'hapus_bast'])->name('hapus_bast');
Route::get('/bapb', [AssetController::class, 'bapb'])->name('bapb');
Route::post('/upload_bapb', [AssetController::class, 'upload_bapb'])->name('upload_bapb');
Route::post('/rubah_bapb/{id}', [AssetController::class, 'rubah_bapb'])->name('rubah_bapb');
Route::get('/hapus_bapb/{id}', [AssetController::class, 'hapus_bapb'])->name('hapus_bapb');

//PDF
Route::get('/eksport_pdf', [PegawaiController::class, 'eksport_pdf'])->name('eksport_pdf');
Route::get('/eksport_aset_pdf', [AssetController::class, 'eksport_aset_pdf'])->name('eksport_aset_pdf');
Route::get('/eksport_aset_masuk_pdf', [AssetController::class, 'eksport_aset_masuk_pdf'])->name('eksport_aset_masuk_pdf');
Route::get('/eksport_report_stock_pdf', [AssetController::class, 'eksport_report_stock_pdf'])->name('eksport_report_stock_pdf');

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
/*Kode KPI*/
Route::get('/eksport_kode_kpi', [KodeKpiController::class, 'eksport_kode_kpi'])->name('eksport_kode_kpi');
Route::post('/import_kode_kpi', [KodeKpiController::class, 'import_kode_kpi'])->name('import_kode_kpi');
/*KPI*/
Route::get('/eksport_kpi', [KpiController::class, 'eksport_kpi'])->name('eksport_kpi');
Route::post('/import_kpi', [KpiController::class, 'import_kpi'])->name('import_kpi');
/*Role User*/
Route::get('/eksport_role_user', [RoleController::class, 'eksport_role_user'])->name('eksport_role_user');
Route::post('/import_role_user', [RoleController::class, 'import_role_user'])->name('import_role_user');
/*Rekap Absen WFH*/
Route::get('/eksport_absensi', [AbsensiController::class, 'eksport_absensi'])->name('eksport_absensi');
/*Rekap Screening Harian*/
Route::get('/eksport_screening', [ScreeningController::class, 'eksport_screening'])->name('eksport_screening');
/*Donatur*/
Route::get('/eksport_donatur', [DonaturController::class, 'eksport_donatur'])->name('eksport_donatur');
Route::post('/import_donatur', [DonaturController::class, 'import_donatur'])->name('import_donatur');
/*Perizinan*/
Route::get('/eksport_cuti', [CutiController::class, 'eksport_cuti'])->name('eksport_cuti');
Route::get('/buka_form_cuti/{id}', [CutiController::class, 'buka_form_cuti'])->name('buka_form_cuti');
Route::get('/simpan_form_cuti/{id}', [CutiController::class, 'simpan_form_cuti'])->name('simpan_form_cuti');
/*Benefit*/
Route::get('/eksport_benefit', [BenefitController::class, 'eksport_benefit'])->name('eksport_benefit');
Route::post('/import_benefit', [BenefitController::class, 'import_benefit'])->name('import_benefit');
/*Jenis Training*/
Route::get('/eksport_jenis_training', [TrainingTypeController::class, 'eksport_jenis_training'])->name('eksport_jenis_training');
Route::post('/import_jenis_training', [TrainingTypeController::class, 'import_jenis_training'])->name('import_jenis_training');
/*Aset*/
Route::get('/eksport_aset', [AssetController::class, 'eksport_aset'])->name('eksport_aset');
Route::post('/import_aset', [AssetController::class, 'import_aset'])->name('import_aset');
Route::get('/eksport_satuan', [AssetController::class, 'eksport_satuan'])->name('eksport_satuan');
Route::post('/import_satuan', [AssetController::class, 'import_satuan'])->name('import_satuan');
Route::get('/eksport_pic', [AssetController::class, 'eksport_pic'])->name('eksport_pic');
Route::post('/import_pic', [AssetController::class, 'import_pic'])->name('import_pic');
Route::get('/eksport_aset_masuk', [AssetController::class, 'eksport_aset_masuk'])->name('eksport_aset_masuk');
Route::get('/eksport_report_stock', [AssetController::class, 'eksport_report_stock'])->name('eksport_report_stock');

