<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistem Pasar</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background: #f5f6fa;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: #0d6efd;
            position: fixed;
            padding-top: 20px;
        }

        .sidebar a {
            color: white;
            display: block;
            padding: 15px;
            text-decoration: none;
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

        body {
            overflow-x: hidden;
        }

        .card {
            transition: 0.3s ease;
            will-change: transform;
        }
    </style>

</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">

        <h3 class="text-center text-white mb-4">
            🛒 Sistem Pasar
        </h3>

        <a href="/">
            <i class="bi bi-house"></i>
            Dashboard
        </a>

        <a href="/riwayat-pembelian">

            <i class="bi bi-clock-history"></i>

            Riwayat Pembelian

        </a>

    </div>

    <!-- Content -->
    <div class="content">

        <!-- Navbar -->
        <nav class="navbar bg-white rounded shadow-sm mb-4">

            <div class="container-fluid">

                <span class="navbar-brand mb-0 h1">

                    Dashboard Pasar

                </span>

            </div>

        </nav>

        @yield('content')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>
