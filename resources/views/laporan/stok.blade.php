@extends('layouts.app')

@section('content')

<h1 class="page-title">Laporan Stok</h1>
<p class="page-subtitle">Daftar persediaan barang toko baju</p>

@include('laporan.partials.styles')

<div class="report-toolbar no-print">
    <div>
        <h2>Laporan Stok Barang</h2>
        <p>{{ now()->format('d M Y') }}</p>
    </div>
    <button type="button" class="print-button" onclick="window.print()">
        <svg viewBox="0 0 24 24"><path d="M6 9V2h12v7" /><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h20a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" transform="scale(.9) translate(1.3 1)" /><path d="M6 14h12v8H6z" /></svg>
        Cetak Laporan
    </button>
</div>

<div class="report-print-header">
    <h2>Toko Baju Emerly</h2>
    <p>Laporan Stok Barang</p>
</div>

<div class="report-summary">
    <section class="card-box summary-card">
        <span>Total Barang</span>
        <strong>{{ $totalBarang }}</strong>
        <small>Jenis produk</small>
    </section>
    <section class="card-box summary-card">
        <span>Total Stok</span>
        <strong>{{ $totalStok }}</strong>
        <small>Unit produk</small>
    </section>
    <section class="card-box summary-card">
        <span>Nilai Stok</span>
        <strong>Rp {{ number_format($nilaiStok, 0, ',', '.') }}</strong>
        <small>Total nilai persediaan</small>
    </section>
    <section class="card-box summary-card">
        <span>Stok Menipis</span>
        <strong>{{ $stokMenipis }}</strong>
        <small>Barang stok rendah</small>
    </section>
</div>

<section class="card-box report-card">
    <div class="table-responsive">
        <table class="report-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Supplier</th>
                    <th class="text-end">Harga Beli</th>
                    <th class="text-end">Harga Jual</th>
                    <th class="text-end">Stok</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($barangs as $barang)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $barang->kode_barang }}</td>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->kategori }}</td>
                        <td>{{ $barang->supplier?->nama_supplier ?? '-' }}</td>
                        <td class="text-end">Rp {{ number_format($barang->harga_beli, 0, ',', '.') }}</td>
                        <td class="text-end">Rp {{ number_format($barang->harga_jual, 0, ',', '.') }}</td>
                        <td class="text-end">{{ $barang->stok }}</td>
                        <td>
                            <span class="status-badge {{ $barang->stok <= 5 ? 'danger' : 'success' }}">
                                {{ $barang->stok <= 5 ? 'Menipis' : 'Aman' }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="empty-row">Belum ada data stok barang</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>

@endsection
