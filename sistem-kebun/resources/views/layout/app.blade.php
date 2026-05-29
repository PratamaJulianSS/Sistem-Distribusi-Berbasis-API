<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistem Kebun</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background-color: #f5f6fa;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: #198754;
            position: fixed;
            color: white;
            padding-top: 20px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 15px;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .card-box {
            border: none;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        html {
            scroll-behavior: smooth;
        }

        .card {
            transition: 0.2s ease;
        }
    </style>

</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">

        <h3 class="text-center mb-4">
            🌱 Sistem Kebun
        </h3>

        <a href="/dashboard">
            <i class="bi bi-house"></i>
            Dashboard
        </a>

        <a href="/produk">
            <i class="bi bi-basket"></i>
            Data Produk
        </a>

        <a href="/riwayat-pesanan">
            <i class="bi bi-clock-history"></i>
            Riwayat Pesanan
        </a>

        <a href="/produk/tambah">
            <i class="bi bi-plus-circle"></i>
            Tambah Produk
        </a>

    </div>

    <!-- Content -->
    <div class="content">

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-white rounded shadow-sm mb-4">

            <div class="container-fluid">

                <span class="navbar-brand mb-0 h1">
                    Dashboard Kebun
                </span>

            </div>

        </nav>

        @yield('content')

    </div>

</body>

</html>
