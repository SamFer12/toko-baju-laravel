@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h2>Data Supplier</h2>
        <small class="text-muted">Kelola data pemasok barang</small>
    </div>

    <button class="btn btn-dark"
        data-bs-toggle="modal"
        data-bs-target="#modalSupplier">
        + Tambah Supplier
    </button>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <div class="mb-3">
            <input type="text"
                   class="form-control"
                   placeholder="Cari supplier...">
        </div>

        <table class="table table-bordered table-hover align-middle">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Supplier</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th width="120">Aksi</th>
                </tr>
            </thead>

            <tbody>

            @forelse($supplier as $s)

                <tr>
                    <td>{{ $s->kode_supplier }}</td>
                    <td>{{ $s->nama_supplier }}</td>
                    <td>{{ $s->alamat }}</td>
                    <td>{{ $s->telepon }}</td>
                    <td>{{ $s->email }}</td>

                    <td>
                        <div class="d-flex gap-1">

                            <button class="btn btn-warning btn-sm">
                                Edit
                            </button>

                            <form action="{{ route('supplier.destroy',$s->id) }}"
                                  method="POST">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">
                                    Hapus
                                </button>

                            </form>

                        </div>
                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="6" class="text-center">
                        Data supplier belum tersedia
                    </td>
                </tr>

            @endforelse

            </tbody>
        </table>

    </div>
</div>

@include('supplier.modal')

@endsection