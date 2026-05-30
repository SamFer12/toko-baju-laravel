<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        $penjualan = Penjualan::all();
        return view('penjualan.index', compact(
            'barang',
            'penjualan'
        ));
    }
}
