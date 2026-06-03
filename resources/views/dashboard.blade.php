@extends('layouts.app')

@section('content')

<h1 class="page-title">Dashboard</h1>
<p class="page-subtitle">Ringkasan manajemen stok toko baju</p>

<style>
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 21px;
        margin-bottom: 30px;
    }

    .stat-card {
        min-height: 192px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .stat-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 14px;
    }

    .stat-label {
        margin: 0;
        color: #000;
        font-size: 17px;
        font-weight: 700;
    }

    .stat-icon {
        width: 24px;
        height: 24px;
        color: #70778a;
    }

    .stat-icon svg {
        width: 100%;
        height: 100%;
        stroke: currentColor;
        stroke-width: 2;
        fill: none;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    .stat-value {
        margin: 0 0 7px;
        color: #000;
        font-size: 30px;
        line-height: 1.1;
        font-weight: 700;
    }

    .stat-caption {
        margin: 0;
        color: #68718f;
        font-size: 14px;
    }

    .dashboard-grid {
        display: grid;
        grid-template-columns: minmax(0, 1fr) minmax(390px, .96fr);
        gap: 21px;
    }

    .dashboard-panel {
        min-height: 425px;
    }

    .panel-title {
        margin: 0 0 34px;
        color: #000;
        font-size: 21px;
        font-weight: 700;
    }

    .empty-text {
        margin: 0;
        color: #68718f;
        font-size: 16px;
    }

    .low-stock-list,
    .supplier-list {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .low-stock-list li {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 18px;
        padding: 14px 0;
        border-bottom: 1px solid #e5e5e5;
    }

    .low-stock-list li:last-child,
    .supplier-list li:last-child {
        border-bottom: 0;
    }

    .item-title {
        margin: 0 0 4px;
        color: #000;
        font-size: 18px;
        font-weight: 700;
    }

    .item-subtitle {
        margin: 0;
        color: #68718f;
        font-size: 16px;
    }

    .stock-badge {
        min-width: 78px;
        padding: 8px 12px;
        border-radius: 8px;
        background: #fff1f1;
        color: #c62828;
        text-align: center;
        font-weight: 700;
    }

    .supplier-summary {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 26px;
        color: #68718f;
        font-size: 22px;
    }

    .supplier-summary svg {
        width: 24px;
        height: 24px;
        stroke: #1f5cff;
        stroke-width: 2.2;
        fill: none;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    .supplier-summary strong {
        color: #000;
        font-size: 30px;
        line-height: 1;
    }

    .supplier-list li {
        padding: 15px 0;
        border-bottom: 1px solid #e5e5e5;
    }

    @media (max-width: 1200px) {
        .stats-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .dashboard-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 576px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }

        .stat-card {
            min-height: 160px;
        }

        .dashboard-panel {
            min-height: 320px;
        }
    }
</style>

<div class="stats-grid">
    <section class="card-box stat-card">
        <div class="stat-top">
            <p class="stat-label">Total Barang</p>
            <span class="stat-icon">
                <svg viewBox="0 0 24 24"><path d="M21 8.5 12 3 3 8.5l9 5.5 9-5.5Z" /><path d="M3 8.5v8.9l9 5.1 9-5.1V8.5" /><path d="M12 14v8.5" /></svg>
            </span>
        </div>
        <div>
            <p class="stat-value">{{ $barang }}</p>
            <p class="stat-caption">Jenis produk</p>
        </div>
    </section>

    <section class="card-box stat-card">
        <div class="stat-top">
            <p class="stat-label">Total Stok</p>
            <span class="stat-icon">
                <svg viewBox="0 0 24 24"><path d="M4 16 9 11l4 4 7-7" /><path d="M14 8h6v6" /></svg>
            </span>
        </div>
        <div>
            <p class="stat-value">{{ $stok }}</p>
            <p class="stat-caption">Unit produk</p>
        </div>
    </section>

    <section class="card-box stat-card">
        <div class="stat-top">
            <p class="stat-label">Nilai Stok</p>
            <span class="stat-icon">
                <svg viewBox="0 0 24 24"><path d="M3 4h2l2.6 11.2a2 2 0 0 0 2 1.6h8.7a2 2 0 0 0 1.9-1.5L22 8H7" /><circle cx="10" cy="21" r="1.5" /><circle cx="18" cy="21" r="1.5" /></svg>
            </span>
        </div>
        <div>
            <p class="stat-value">Rp {{ number_format($nilai, 0, ',', '.') }}</p>
            <p class="stat-caption">Total nilai persediaan</p>
        </div>
    </section>

    <section class="card-box stat-card">
        <div class="stat-top">
            <p class="stat-label">Penjualan Hari Ini</p>
            <span class="stat-icon">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9" /><path d="M12 7v10" /><path d="m8 13 4 4 4-4" /></svg>
            </span>
        </div>
        <div>
            <p class="stat-value">Rp {{ number_format($penjualanHariIni, 0, ',', '.') }}</p>
            <p class="stat-caption">{{ $transaksiHariIni }} transaksi</p>
        </div>
    </section>
</div>

<div class="dashboard-grid">
    <section class="card-box dashboard-panel">
        <h2 class="panel-title">Stok Menipis</h2>

        @if ($stokMenipis->isEmpty())
            <p class="empty-text">Semua barang stoknya aman</p>
        @else
            <ul class="low-stock-list">
                @foreach ($stokMenipis as $item)
                    <li>
                        <div>
                            <p class="item-title">{{ $item->nama_barang }}</p>
                            <p class="item-subtitle">{{ $item->supplier?->nama_supplier ?? 'Tanpa supplier' }}</p>
                        </div>
                        <span class="stock-badge">{{ $item->stok }} unit</span>
                    </li>
                @endforeach
            </ul>
        @endif
    </section>

    <section class="card-box dashboard-panel">
        <h2 class="panel-title">Informasi Supplier</h2>
        <div class="supplier-summary">
            <svg viewBox="0 0 24 24"><path d="M3 6h12v11H3z" /><path d="M15 10h3l3 3v4h-6z" /><circle cx="7" cy="18" r="2" /><circle cx="18" cy="18" r="2" /></svg>
            <strong>{{ $supplier }}</strong>
            <span>Supplier Terdaftar</span>
        </div>

        @if ($supplierTerbaru->isEmpty())
            <p class="empty-text">Belum ada supplier terdaftar</p>
        @else
            <ul class="supplier-list">
                @foreach ($supplierTerbaru as $item)
                    <li>
                        <p class="item-title">{{ $item->nama_supplier }}</p>
                        <p class="item-subtitle">{{ $item->telepon }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </section>
</div>

@endsection
