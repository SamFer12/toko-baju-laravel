<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\LaporanController;
use Illuminate\Http\Request;

Route::get('/login', function () {
    if (session('admin_login')) {
        return redirect()->to(url('/'));
    }

    return view('admin.login');
})->name('login');

Route::post('/login', function (Request $request) {
    $request->validate([
        'username' => ['required'],
        'password' => ['required'],
    ]);

    if ($request->username === 'admin' && $request->password === 'admin') {
        $request->session()->put('admin_login', true);
        return redirect()->to(url('/'));
    }

    return back()
        ->withErrors(['login' => 'Username atau password salah.'])
        ->onlyInput('username');
});

Route::post('/logout', function (Request $request) {
    $request->session()->forget('admin_login');
    return redirect()->route('login');
})->name('logout');

Route::middleware('admin.session')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);

    Route::resource('barang', BarangController::class);
    Route::resource('supplier', SupplierController::class);

    Route::get('barang-masuk',[BarangMasukController::class, 'index'])->name('barang-masuk.index');
    Route::post('barang-masuk/store',[BarangMasukController::class, 'store'])->name('barang-masuk.store');

    Route::get('penjualan',[PenjualanController::class, 'index'])->name('penjualan.index');
    Route::post('penjualan/store',[PenjualanController::class, 'store'])->name('penjualan.store');

    Route::get('laporan/stok', [LaporanController::class, 'stok']);
    Route::get('laporan/barang-masuk', [LaporanController::class, 'barangMasuk']);
    Route::get('laporan/penjualan', [LaporanController::class, 'penjualan']);


    Route::resource('supplier', SupplierController::class);
});
