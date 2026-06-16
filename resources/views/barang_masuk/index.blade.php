@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-between mb-3">

    <h2>Barang Masuk</h2>

    <button
        class="btn btn-primary"
        data-bs-toggle="modal"
        data-bs-target="#modalBarangMasuk">
        Tambah Barang Masuk
    </button>

</div>

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

<table class="table table-bordered">

    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Barang</th>
            <th>Supplier</th>
            <th>Jumlah</th>
            <th>Harga Beli</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
    @forelse($barangMasuk as $item) 
        <tr>
            <td>{{ $item->tanggal }}</td>
            <td>
                {{ $item->barang->nama_barang }}
            </td>
            <td>
                {{ $item->supplier->nama_supplier }}
            </td>
            <td>
                {{ $item->jumlah }}
            </td>
            <td>
                Rp {{ number_format($item->harga_beli) }}
            </td>
            <td>
                {{ $item->keterangan }}
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6" class="text-center">
                Belum ada data
            </td>
        </tr>
    @endforelse
    </tbody>

</table>

@include('barang_masuk.modal')

@endsection