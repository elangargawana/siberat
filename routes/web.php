<?php

use App\Http\Controllers\DBBackupController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PenawaranController;
use App\Http\Controllers\ActionPenawaran;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PurchaseorderController;
use App\Http\Controllers\SuratJalanController;
use App\Http\Controllers\KonsumenController;
use App\Http\Controllers\DetailPenawaranController;
use App\Http\Controllers\DetailPurchaseOrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::permanentRedirect('/', '/login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('profil', ProfilController::class)->except('destroy');

Route::resource('konsumen', KonsumenController::class);
Route::resource('manage-user', UserController::class);
Route::resource('manage-role', RoleController::class);
Route::resource('manage-menu', MenuController::class);
Route::resource('manage-permission', PermissionController::class)->only('store', 'destroy');
Route::resource('manage-penawaran', PenawaranController::class);
Route::resource('manage-barang', BarangController::class);
Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
Route::put('/barang/{barang}', [BarangController::class, 'update'])->name('barang.update');
Route::resource('/manage-purchaseorder', PurchaseorderController::class);

Route::put('/purchaseorders/{id}', [PurchaseorderController::class, 'update'])->name('purchaseorder.update');
Route::get('/purchaseorders', [PurchaseorderController::class, 'index'])->name('purchaseorder.index');
Route::get('/purchaseorders/{id}/edit', [PurchaseorderController::class, 'edit'])->name('purchaseorder.edit');
Route::post('/purchaseorders/{id}/updateType', [PurchaseorderController::class, 'updateType'])->name('purchaseorder.updateType');
Route::delete('/purchaseorders/{id}', [PurchaseorderController::class, 'destroy'])->name('purchaseorder.destroy');
Route::resource('manage-suratjalan', SuratjalanController::class);
Route::resource('manage-form', FormController::class);
Route::get('/manage-penawaran', [PenawaranController::class, 'index'])->name('penawaran.index');
Route::get('/tambahpenawaran', [PenawaranController::class, 'tambahpenawaran'])->name('penawaran.tambahpenawaran');
Route::post('/manage-penawaran', [PenawaranController::class, 'store'])->name('penawaran.store');
Route::resource('/manage-konsumen', KonsumenController::class);
Route::get('/tambahkonsumen', [KonsumenController::class, 'tambahkonsumen'])->name('konsumen.tambahkonsumen');
Route::get('dbbackup', [DBBackupController::class, 'DBDataBackup']);
Route::get('/penawaran', [PenawaranController::class, 'index'])->name('penawaran.index');
Route::get('/penawaran/create', [PenawaranController::class, 'create'])->name('penawaran.create');
Route::post('/action_penawaran', [ActionPenawaran::class, 'tambahPenawaran']);
Route::post('/penawaran', [PenawaranController::class, 'store'])->name('penawaran.store');
Route::get('/penawaran/{id}/edit', [PenawaranController::class, 'edit'])->name('penawaran.edit');
Route::delete('/penawaran/{id}', [PenawaranController::class, 'destroy'])->name('penawaran.destroy');
Route::get('/penawaran/{id}/detail', [PenawaranController::class, 'show'])->name('penawaran.show');
Route::get('penawaran/{id}/konfirmasi', 'PenawaranController@konfirmasi')->name('penawaran.konfirmasi');
Route::get('penawaran/{id}/detail', 'PenawaranController@show')->name('penawaran.detail');


Route::resource('suratjalan', SuratJalanController::class);
Route::put('suratjalan/{suratjalan}/confirm', [SuratJalanController::class, 'confirm'])->name('suratjalan.confirm');
Route::post('/suratjalan', [SuratJalanController::class, 'store'])->name('suratjalan.store');

Route::get('purchaseorder/{id}/unduh', [PurchaseOrderController::class, 'unduh'])->name('purchaseorder.unduh');
Route::get('/purchaseorder/{id}/info', [PurchaseOrderController::class, 'info'])->name('purchaseorder.info');


Route::resource('detail', DetailPenawaranController::class)->only(['edit', 'update', 'destroy']);
Route::resource('penawaran', PenawaranController::class);
Route::get('penawaran/{id}/konfirmasi', [PenawaranController::class, 'konfirmasi'])->name('penawaran.konfirmasi');
Route::post('/purchaseorder/{id}/update-status', [PurchaseOrderController::class, 'updateStatus'])->name('purchaseorder.updateStatus');
Route::post('/purchaseorder/{id}/create-suratjalan', [PurchaseOrderController::class, 'createSuratJalan'])->name('purchaseorder.createSuratJalan');
Route::get('/suratjalan/create', [SuratJalanController::class, 'create'])->name('suratjalan.create');
Route::get('/purchaseorder/{id}/create-suratjalan', [SuratJalanController::class, 'create'])->name('suratjalan.create');
Route::get('/purchaseorder/{id}/detail', 'PurchaseorderController@show')->name('purchaseorder.detail');
Route::get('/suratjalan/{id}/detail', [PurchaseorderController::class,'huft'])->name('purchaseorder.huft');

// Route untuk menyimpan surat jalan
Route::post('/suratjalan', [SuratJalanController::class, 'store'])->name('suratjalan.store');
Route::resource('purchaseorder', PurchaseOrderController::class);
Route::resource('suratjalan', SuratJalanController::class);

Route::post('purchaseorder/{id}/create-suratjalan', [PurchaseOrderController::class, 'createSuratJalan'])->name('purchaseorder.createSuratJalan');
Route::put('/suratjalan/{id}', 'SuratJalanController@update')->name('suratjalan.update');

Route::get('penawaran/{id}/unduh', [PenawaranController::class, 'unduh'])->name('penawaran.unduh');
Route::get('suratjalan/{id}/unduh', [SuratJalanController::class, 'unduh'])->name('suratjalan.unduh');
Route::get('/purchaseorder/{id}/create-suratjalan', [PurchaseOrderController::class, 'createSuratJalan'])->name('purchaseorder.createSuratJalan');

Route::get('/suratjalan/{id}', 'SuratJalanController@show')->name('suratjalan.show');
Route::get('/purchaseorder/{id}', 'PurchaseorderController@show')->name('suratjalan.show');


