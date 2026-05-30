@extends('layouts.app')

@section('content')

<h2>Dashboard</h2>

<div class="row mt-4">

    <div class="col-md-3">
        <div class="card-box">
            <h6>Total Barang</h6>
            <h2>{{ $barang }}</h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-box">
            <h6>Total Stock</h6>
            <h2>{{ $stok }}</h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-box">
            <h6>Nilai Stock</h6>
            <h2>Rp {{ number_format($nilai) }}</h2>
        </div>
    </div>

</div>

@endsection