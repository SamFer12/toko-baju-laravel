<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\LaporanController;

Route::get('/', [DashboardController::class, 'index']);

Route::resource('barang', BarangController::class);
Route::resource('supplier', SupplierController::class);

Route::get('barang-masuk', [BarangMasukController::class, 'index']);
Route::post('barang-masuk/store', [BarangMasukController::class, 'store']);

Route::get('penjualan', [PenjualanController::class, 'index']);
Route::post('penjualan/store', [PenjualanController::class, 'store']);

Route::get('laporan/stok', [LaporanController::class, 'stok']);
Route::get('laporan/barang-masuk', [LaporanController::class, 'barangMasuk']);
Route::get('laporan/penjualan', [LaporanController::class, 'penjualan']);