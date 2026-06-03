<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function stok()
    {
        $barangs = Barang::with('supplier')
            ->orderBy('nama_barang')
            ->get();

        $totalBarang = $barangs->count();
        $totalStok = $barangs->sum('stok');
        $nilaiStok = $barangs->sum(fn ($barang) => $barang->stok * $barang->harga_beli);
        $stokMenipis = $barangs->where('stok', '<=', 5)->count();

        return view('laporan.stok', compact(
            'barangs',
            'totalBarang',
            'totalStok',
            'nilaiStok',
            'stokMenipis'
        ));
    }

    public function barangMasuk(Request $request)
    {
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $barangMasuk = BarangMasuk::with('barang', 'supplier')
            ->when($tanggalAwal, fn ($query) => $query->whereDate('tanggal', '>=', $tanggalAwal))
            ->when($tanggalAkhir, fn ($query) => $query->whereDate('tanggal', '<=', $tanggalAkhir))
            ->orderByDesc('tanggal')
            ->get();

        $totalJumlah = $barangMasuk->sum('jumlah');
        $totalNilai = $barangMasuk->sum(fn ($item) => $item->jumlah * $item->harga_beli);

        return view('laporan.barang-masuk', compact(
            'barangMasuk',
            'tanggalAwal',
            'tanggalAkhir',
            'totalJumlah',
            'totalNilai'
        ));
    }

    public function penjualan(Request $request)
    {
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $penjualan = Penjualan::query()
            ->when($tanggalAwal, fn ($query) => $query->whereDate('tanggal', '>=', $tanggalAwal))
            ->when($tanggalAkhir, fn ($query) => $query->whereDate('tanggal', '<=', $tanggalAkhir))
            ->orderByDesc('tanggal')
            ->get();

        $totalTransaksi = $penjualan->count();
        $totalPenjualan = $penjualan->sum('total');
        $totalBayar = $penjualan->sum('bayar');
        $totalKembalian = $penjualan->sum('kembalian');

        return view('laporan.penjualan', compact(
            'penjualan',
            'tanggalAwal',
            'tanggalAkhir',
            'totalTransaksi',
            'totalPenjualan',
            'totalBayar',
            'totalKembalian'
        ));
    }
}
