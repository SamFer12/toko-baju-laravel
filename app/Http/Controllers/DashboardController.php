<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Supplier;
use App\Models\Penjualan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $barang = Barang::count();
        $stok = Barang::sum('stok');
        $nilai = Barang::sum(DB::raw('stok * harga_beli'));
        $supplier = Supplier::count();
        $penjualanHariIni = Penjualan::whereDate('tanggal', now()->toDateString())->sum('total');
        $transaksiHariIni = Penjualan::whereDate('tanggal', now()->toDateString())->count();
        $stokMenipis = Barang::with('supplier')
            ->where('stok', '<=', 5)
            ->orderBy('stok')
            ->limit(5)
            ->get();
        $supplierTerbaru = Supplier::latest()->limit(3)->get();

        return view('dashboard', compact(
            'barang',
            'stok',
            'nilai',
            'supplier',
            'penjualanHariIni',
            'transaksiHariIni',
            'stokMenipis',
            'supplierTerbaru'
        ));
    }
}
