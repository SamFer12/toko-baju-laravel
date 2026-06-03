@extends('layouts.app')

@section('content')

<h1 class="page-title">Laporan Penjualan</h1>
<p class="page-subtitle">Rekap transaksi penjualan toko baju</p>

@include('laporan.partials.styles')

<div class="report-toolbar no-print">
    <div>
        <h2>Laporan Penjualan</h2>
        <p>{{ $tanggalAwal || $tanggalAkhir ? (($tanggalAwal ?: 'Awal') . ' sampai ' . ($tanggalAkhir ?: 'Sekarang')) : 'Semua periode' }}</p>
    </div>
    <button type="button" class="print-button" onclick="window.print()">
        <svg viewBox="0 0 24 24"><path d="M6 9V2h12v7" /><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h20a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" transform="scale(.9) translate(1.3 1)" /><path d="M6 14h12v8H6z" /></svg>
        Cetak Laporan
    </button>
</div>

<form class="card-box filter-card no-print" method="GET" action="{{ url('/laporan/penjualan') }}">
    <div class="filter-field">
        <label for="tanggal_awal">Tanggal Awal</label>
        <input type="date" id="tanggal_awal" name="tanggal_awal" value="{{ $tanggalAwal }}">
    </div>
    <div class="filter-field">
        <label for="tanggal_akhir">Tanggal Akhir</label>
        <input type="date" id="tanggal_akhir" name="tanggal_akhir" value="{{ $tanggalAkhir }}">
    </div>
    <div class="filter-actions">
        <button type="submit" class="filter-button primary">Tampilkan</button>
        <a href="{{ url('/laporan/penjualan') }}" class="filter-button">Reset</a>
    </div>
</form>

<div class="report-print-header">
    <h2>Toko Baju Emerly</h2>
    <p>Laporan Penjualan</p>
    <small>{{ $tanggalAwal || $tanggalAkhir ? (($tanggalAwal ?: 'Awal') . ' sampai ' . ($tanggalAkhir ?: 'Sekarang')) : 'Semua periode' }}</small>
</div>

<div class="report-summary">
    <section class="card-box summary-card">
        <span>Total Transaksi</span>
        <strong>{{ $totalTransaksi }}</strong>
        <small>Transaksi penjualan</small>
    </section>
    <section class="card-box summary-card">
        <span>Total Penjualan</span>
        <strong>Rp {{ number_format($totalPenjualan, 0, ',', '.') }}</strong>
        <small>Nominal transaksi</small>
    </section>
    <section class="card-box summary-card">
        <span>Total Bayar</span>
        <strong>Rp {{ number_format($totalBayar, 0, ',', '.') }}</strong>
        <small>Uang diterima</small>
    </section>
    <section class="card-box summary-card">
        <span>Kembalian</span>
        <strong>Rp {{ number_format($totalKembalian, 0, ',', '.') }}</strong>
        <small>Total kembalian</small>
    </section>
</div>

<section class="card-box report-card">
    <div class="table-responsive">
        <table class="report-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Invoice</th>
                    <th>Tanggal</th>
                    <th class="text-end">Total</th>
                    <th class="text-end">Bayar</th>
                    <th class="text-end">Kembalian</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($penjualan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->invoice }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>
                        <td class="text-end">Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                        <td class="text-end">Rp {{ number_format($item->bayar, 0, ',', '.') }}</td>
                        <td class="text-end">Rp {{ number_format($item->kembalian, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="empty-row">Belum ada data penjualan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>

@endsection
