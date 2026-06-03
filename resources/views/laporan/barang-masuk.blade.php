@extends('layouts.app')

@section('content')

<h1 class="page-title">Laporan Barang Masuk</h1>
<p class="page-subtitle">Rekap penerimaan barang dari supplier</p>

@include('laporan.partials.styles')

<div class="report-toolbar no-print">
    <div>
        <h2>Laporan Barang Masuk</h2>
        <p>{{ $tanggalAwal || $tanggalAkhir ? (($tanggalAwal ?: 'Awal') . ' sampai ' . ($tanggalAkhir ?: 'Sekarang')) : 'Semua periode' }}</p>
    </div>
    <button type="button" class="print-button" onclick="window.print()">
        <svg viewBox="0 0 24 24"><path d="M6 9V2h12v7" /><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h20a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" transform="scale(.9) translate(1.3 1)" /><path d="M6 14h12v8H6z" /></svg>
        Cetak Laporan
    </button>
</div>

<form class="card-box filter-card no-print" method="GET" action="{{ url('/laporan/barang-masuk') }}">
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
        <a href="{{ url('/laporan/barang-masuk') }}" class="filter-button">Reset</a>
    </div>
</form>

<div class="report-print-header">
    <h2>Toko Baju Emerly</h2>
    <p>Laporan Barang Masuk</p>
    <small>{{ $tanggalAwal || $tanggalAkhir ? (($tanggalAwal ?: 'Awal') . ' sampai ' . ($tanggalAkhir ?: 'Sekarang')) : 'Semua periode' }}</small>
</div>

<div class="report-summary two">
    <section class="card-box summary-card">
        <span>Total Barang Masuk</span>
        <strong>{{ $totalJumlah }}</strong>
        <small>Unit diterima</small>
    </section>
    <section class="card-box summary-card">
        <span>Total Nilai</span>
        <strong>Rp {{ number_format($totalNilai, 0, ',', '.') }}</strong>
        <small>Nilai barang masuk</small>
    </section>
</div>

<section class="card-box report-card">
    <div class="table-responsive">
        <table class="report-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Supplier</th>
                    <th class="text-end">Jumlah</th>
                    <th class="text-end">Harga Beli</th>
                    <th class="text-end">Subtotal</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($barangMasuk as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>
                        <td>{{ $item->barang?->kode_barang ?? '-' }}</td>
                        <td>{{ $item->barang?->nama_barang ?? '-' }}</td>
                        <td>{{ $item->supplier?->nama_supplier ?? '-' }}</td>
                        <td class="text-end">{{ $item->jumlah }}</td>
                        <td class="text-end">Rp {{ number_format($item->harga_beli, 0, ',', '.') }}</td>
                        <td class="text-end">Rp {{ number_format($item->jumlah * $item->harga_beli, 0, ',', '.') }}</td>
                        <td>{{ $item->keterangan ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="empty-row">Belum ada data barang masuk</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>

@endsection
