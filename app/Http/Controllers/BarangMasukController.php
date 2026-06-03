<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Barang;
use App\Models\Supplier;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barangMasuk = BarangMasuk::with(
            'barang',
            'supplier'
        )->get();
        $barang = Barang::all();
        $supplier = Supplier::all();
        return view('barang_masuk.index', compact(
            'barangMasuk',
            'barang',
            'supplier'
        ));
    }

    public function store(Request $r)
    {
        BarangMasuk::create($r->all());
        $barang = Barang::find($r->barang_id);
        $barang->stok += $r->jumlah;
        $barang->save();
        return back();
    }
}