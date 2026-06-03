@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">

    <h2>Data Penjualan</h2>

    <button
        class="btn btn-primary"
        data-bs-toggle="modal"
        data-bs-target="#modalPenjualan">

        Transaksi Penjualan

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
            <th>Invoice</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Bayar</th>
            <th>Kembalian</th>
        </tr>
    </thead>

    <tbody>

        @foreach($penjualan as $p)

        <tr>

            <td>{{ $p->invoice }}</td>

            <td>{{ $p->tanggal }}</td>

            <td>
                Rp {{ number_format($p->total) }}
            </td>

            <td>
                Rp {{ number_format($p->bayar) }}
            </td>

            <td>
                Rp {{ number_format($p->kembalian) }}
            </td>

        </tr>

        @endforeach

    </tbody>

</table>

@include('penjualan.modal')

@endsection