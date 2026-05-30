<!DOCTYPE html>
<html>

<head>
    <title>Toko Baju</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f5f5;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: white;
            position: fixed;
            border-right: 1px solid #ddd;
        }

        .content {
            margin-left: 250px;
            padding: 30px;
        }

        .menu {
            padding: 12px 20px;
            display: block;
            color: #333;
            text-decoration: none;
            border-radius: 10px;
            margin: 5px 10px;
        }

        .menu:hover {
            background: #0d6efd;
            color: white;
        }

        .active {
            background: #0d6efd;
            color: white;
        }

        .card-box {
            background: white;
            border-radius: 15px;
            padding: 20px;
        }
    </style>
</head>

<body>

    <div class="sidebar p-3">
        <h4>Toko Baju Emerly</h4>
        <small>Administrator</small>

        <hr>

        <a href="/" class="menu">Dashboard</a>
        <a href="/barang" class="menu">Data Barang</a>
        <a href="/supplier" class="menu">Data Supplier</a>
        <a href="/barang-masuk" class="menu">Barang Masuk</a>
        <a href="/penjualan" class="menu">Penjualan</a>
        <a href="/laporan/stok" class="menu">Laporan Stok</a>
        <a href="/laporan/barang-masuk" class="menu">Laporan Barang Masuk</a>
        <a href="/laporan/penjualan" class="menu">Laporan Penjualan</a>
    </div>

    <div class="content">
        @yield('content')
    </div>

</body>

</html>