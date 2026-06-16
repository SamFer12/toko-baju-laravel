<!DOCTYPE html>
<html>

<head>
    <title>Toko Baju</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f8f9fb;
            color: #000;
            font-family: Arial, Helvetica, sans-serif;
        }

        .sidebar {
            width: 316px;
            height: 100vh;
            background: white;
            position: fixed;
            left: 0;
            top: 0;
            display: flex;
            flex-direction: column;
            border-right: 1px solid #dedede;
        }

        .brand {
            padding: 35px 26px 31px;
            border-bottom: 1px solid #e4e4e4;
        }

        .brand h4 {
            margin: 0 0 10px;
            color: #000;
            font-size: 23px;
            font-weight: 700;
        }

        .brand small {
            color: #68718f;
            font-size: 18px;
        }

        .nav-menu {
            flex: 1;
            padding: 21px 16px;
        }

        .menu {
            min-height: 49px;
            padding: 12px 16px;
            display: flex;
            align-items: center;
            gap: 16px;
            color: #1e2b44;
            text-decoration: none;
            border-radius: 10px;
            margin-bottom: 6px;
            font-size: 20px;
            line-height: 1;
        }

        .menu:hover {
            background: #eff4ff;
            color: #1f5cff;
        }

        .menu.active {
            background: #1f5cff;
            color: white;
        }

        .menu svg {
            width: 25px;
            height: 25px;
            flex: 0 0 25px;
            stroke: currentColor;
            stroke-width: 2.2;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .sidebar-footer {
            padding: 20px 16px 23px;
            border-top: 1px solid #e5e5e5;
        }

        .logout-button {
            width: 100%;
            min-height: 45px;
            padding: 10px 16px;
            display: flex;
            align-items: center;
            gap: 16px;
            border: 1px solid #e1e1e1;
            border-radius: 9px;
            background: #fff;
            color: #000;
            font-size: 16px;
            font-weight: 700;
            text-align: left;
        }

        .logout-button:hover {
            background: #f6f7f9;
        }

        .logout-button svg {
            width: 20px;
            height: 20px;
            stroke: currentColor;
            stroke-width: 2;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .content {
            min-height: 100vh;
            margin-left: 316px;
            padding: 34px 30px 40px;
        }

        .page-title {
            margin: 0 0 11px;
            color: #000;
            font-size: 38px;
            line-height: 1.1;
            font-weight: 700;
        }

        .page-subtitle {
            margin: 0 0 32px;
            color: #68718f;
            font-size: 20px;
        }

        .card-box {
            background: white;
            border: 1px solid #e2e2e2;
            border-radius: 16px;
            padding: 28px 30px;
        }

        @media (max-width: 992px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: static;
            }

            .nav-menu {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
                gap: 8px;
            }

            .menu {
                margin: 0;
            }

            .content {
                margin-left: 0;
                padding: 28px 18px;
            }
        }

        @media (max-width: 576px) {
            .brand {
                padding: 26px 18px 22px;
            }

            .page-title {
                font-size: 32px;
            }

            .menu {
                font-size: 18px;
            }
        }

        @media print {
            body {
                background: #fff;
            }

            .sidebar,
            .no-print {
                display: none !important;
            }

            .content {
                margin: 0;
                padding: 0;
            }

            .card-box {
                border-color: #d6d6d6;
                break-inside: avoid;
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar">
        <div class="brand">
            <h4>Toko Baju Emerly</h4>
            <small>Administrator</small>
        </div>

        <nav class="nav-menu">
            <a href="{{ url('/') }}" class="menu {{ request()->is('/') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1.5" /><rect x="14" y="3" width="7" height="7" rx="1.5" /><rect x="3" y="14" width="7" height="7" rx="1.5" /><rect x="14" y="14" width="7" height="7" rx="1.5" /></svg>
                <span>Dashboard</span>
            </a>
            <a href="{{ url('/barang') }}" class="menu {{ request()->is('barang') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24"><path d="M21 8.5 12 3 3 8.5l9 5.5 9-5.5Z" /><path d="M3 8.5v8.9l9 5.1 9-5.1V8.5" /><path d="M12 14v8.5" /></svg>
                <span>Data Barang</span>
            </a>
            <a href="{{ url('/supplier') }}" class="menu {{ request()->is('supplier*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24"><path d="M3 6h12v11H3z" /><path d="M15 10h3l3 3v4h-6z" /><circle cx="7" cy="18" r="2" /><circle cx="18" cy="18" r="2" /></svg>
                <span>Data Supplier</span>
            </a>
            <a href="{{ url('/barang-masuk') }}" class="menu {{ request()->is('barang-masuk*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" /><path d="M12 6v12" /><path d="m7 13 5 5 5-5" /></svg>
                <span>Barang Masuk</span>
            </a>
            <a href="{{ url('/penjualan') }}" class="menu {{ request()->is('penjualan*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24"><path d="M3 4h2l2.6 11.2a2 2 0 0 0 2 1.6h8.7a2 2 0 0 0 1.9-1.5L22 8H7" /><circle cx="10" cy="21" r="1.5" /><circle cx="18" cy="21" r="1.5" /></svg>
                <span>Penjualan</span>
            </a>
            <a href="{{ url('/laporan/stok') }}" class="menu {{ request()->is('laporan/stok') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24"><path d="M6 2h9l5 5v15H6z" /><path d="M14 2v6h6" /><path d="M9 13h7" /><path d="M9 17h7" /></svg>
                <span>Laporan Stok</span>
            </a>
            <a href="{{ url('/laporan/barang-masuk') }}" class="menu {{ request()->is('laporan/barang-masuk') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24"><path d="M6 2h9l5 5v15H6z" /><path d="M14 2v6h6" /><path d="M9 12h5" /><path d="M9 16h8" /></svg>
                <span>Laporan Barang Masuk</span>
            </a>
            <a href="{{ url('/laporan/penjualan') }}" class="menu {{ request()->is('laporan/penjualan') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24"><path d="M6 2h9l5 5v15H6z" /><path d="M14 2v6h6" /><path d="M9 12h7" /><path d="M9 16h7" /></svg>
                <span>Laporan Penjualan</span>
            </a>
        </nav>

        <div class="sidebar-footer">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-button">
                    <svg viewBox="0 0 24 24"><path d="M14 8V5a2 2 0 0 0-2-2H5v18h7a2 2 0 0 0 2-2v-3" /><path d="M9 12h12" /><path d="m17 8 4 4-4 4" /></svg>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <main class="content">
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
