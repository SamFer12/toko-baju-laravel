@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between">
    <h2>Data Barang</h2>
    <button class="btn btn-dark"
        data-bs-toggle="modal"
        data-bs-target="#modalBarang">
        + Tambah Barang
    </button>
</div>

<div class="card-box mt-3">
    <table class="table">
        <tr>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Stock</th>
            <th>Supplier</th>
            <th>Aksi</th>
        </tr>
        @foreach($barang as $b)
        <tr>
            <td>{{ $b->kode_barang }}</td>
            <td>{{ $b->nama_barang }}</td>
            <td>{{ $b->kategori }}</td>
            <td>Rp {{ number_format($b->harga_beli) }}</td>
            <td>Rp {{ number_format($b->harga_jual) }}</td>
            <td>{{ $b->stok }}</td>
            <td>{{ $b->supplier->nama_supplier }}</td>
            <td>
                <form action="/barang/{{ $b->id }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

</div>

@include('barang.modal')
@endsection