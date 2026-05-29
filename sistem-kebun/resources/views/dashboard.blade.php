@extends('layout.app')

@section('content')

<h2 class="mb-4">
    Dashboard Sistem Kebun
</h2>

<div class="row">

    <!-- Total Produk -->
    <div class="col-md-4 mb-4">

        <div class="card card-box bg-success text-white">

            <div class="card-body">

                <h5>Total Produk</h5>

                <h1>{{ $totalProduk }}</h1>

            </div>

        </div>

    </div>

    <!-- Total Stok -->
    <div class="col-md-4 mb-4">

        <div class="card card-box bg-primary text-white">

            <div class="card-body">

                <h5>Total Stok</h5>

                <h1>{{ $totalStok }}</h1>

            </div>

        </div>

    </div>

    <!-- Stok Sedikit -->
    <div class="col-md-4 mb-4">

        <div class="card card-box bg-danger text-white">

            <div class="card-body">

                <h5>Stok Hampir Habis</h5>

                <h1>{{ $stokSedikit }}</h1>

            </div>

        </div>

    </div>

</div>

<div class="card card-box">

    <div class="card-body">

        <h4>
            Selamat Datang di Sistem Kebun 🌱
        </h4>

        <p>
            Sistem ini digunakan untuk mengelola
            data hasil panen dan stok produk kebun.
        </p>

    </div>

</div>

<div class="card card-box mt-4">

    <div class="card-body">

        <h4 class="mb-4">

            Grafik Stok Produk

        </h4>

        <canvas id="stokChart"></canvas>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

document.addEventListener("DOMContentLoaded", function () {

    const ctx =
    document.getElementById('stokChart');

    new Chart(ctx, {

        type: 'bar',

        data: {

            labels: [

                @foreach($produk as $p)

                    '{{ $p->nama_produk }}',

                @endforeach

            ],

            datasets: [{

                label: 'Jumlah Stok',

                data: [

                    @foreach($produk as $p)

                        {{ $p->stok }},

                    @endforeach

                ],

                borderWidth: 1

            }]

        },

        options: {

            responsive: true,

            scales: {

                y: {

                    beginAtZero: true

                }

            }

        }

    });

});

</script>

@endsection