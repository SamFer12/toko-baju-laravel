<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Supplier;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $barang = Barang::count();
        $stok = Barang::sum('stok');
        $nilai = Barang::sum(DB::raw('stok * harga_beli'));
        $supplier = Supplier::count();
        $penjualan = Penjualan::sum('total');
        return view('dashboard', compact(
            'barang',
            'stok',
            'nilai'
        ));
    }
}
