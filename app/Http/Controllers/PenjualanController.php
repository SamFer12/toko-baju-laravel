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

        $penjualan = Penjualan::latest()
            ->get();

        return view(
            'penjualan.index',
            compact(
                'barang',
                'penjualan'
            )
        );
    }

    public function store(Request $request)
    {
        $penjualan = Penjualan::create([
            'invoice' =>
            'INV-' . date('YmdHis'),

            'tanggal' => now(),

            'total' => $request->total,

            'bayar' => $request->bayar,

            'kembalian' =>
            $request->bayar -
                $request->total
        ]);

        foreach (
            $request->barang_id
            as $key => $barangId
        ) {

            $barang =
                Barang::findOrFail(
                    $barangId
                );

            $qty =
                $request->jumlah[$key];

            DetailPenjualan::create([

                'penjualan_id' =>
                $penjualan->id,

                'barang_id' =>
                $barangId,

                'jumlah' =>
                $qty,

                'subtotal' =>
                $barang->harga_jual *
                    $qty
            ]);

            $barang->stok =
                $barang->stok - $qty;

            $barang->save();
        }

        return redirect()
            ->back()
            ->with(
                'success',
                'Penjualan berhasil'
            );
    }
}