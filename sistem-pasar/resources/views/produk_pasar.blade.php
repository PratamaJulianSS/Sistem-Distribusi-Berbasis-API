@extends('layout.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">

            {{ session('success') }}

        </div>
    @endif

    <h2 class="mb-4">
        Dashboard Sistem Pasar
    </h2>

    <!-- Statistik -->
    <div class="row">

        <div class="col-md-6 mb-4">

            <div class="card card-box bg-primary text-white">

                <div class="card-body">

                    <h5>Total Produk</h5>

                    <h1>{{ $totalProduk }}</h1>

                </div>

            </div>

        </div>

        <div class="col-md-6 mb-4">

            <div class="card card-box bg-success text-white">

                <div class="card-body">

                    <h5>Total Stok</h5>

                    <h1>{{ $totalStok }}</h1>

                </div>

            </div>

        </div>

    </div>

    <!-- Tabel -->
    <div class="card card-box">

        <div class="card-body">

            <h4 class="mb-4">
                Data Produk Kebun
            </h4>

            <div class="mb-3">

                <input type="text" id="searchInput" class="form-control" placeholder="Cari produk...">

            </div>

            <div class="row">

                @foreach ($produk as $p)
                    <div class="col-md-4 mb-4 produk-card">

                        <div class="card shadow border-0 rounded-4 h-100">

                            <!-- Gambar -->
                            @if ($p['gambar'])
                                <img src="http://127.0.0.1:8000/gambar_produk/{{ $p['gambar'] }}" class="card-img-top"
                                    style="
                    height:250px;
                    object-fit:cover;
                ">
                            @else
                                <img src="https://via.placeholder.com/300x250" class="card-img-top">
                            @endif

                            <div class="card-body">

                                <h4 class="fw-bold">

                                    {{ $p['nama_produk'] }}

                                </h4>

                                <span class="badge bg-success mb-3">

                                    Stok:
                                    {{ $p['stok'] }}

                                </span>

                                <form action="/pesan" method="POST">

                                    @csrf

                                    <input type="hidden" name="id" value="{{ $p['id'] }}">

                                    <div class="d-flex">

                                        <input type="number" name="jumlah" class="form-control" placeholder="Jumlah"
                                            required>

                                        <button class="btn btn-primary ms-2">

                                            Pesan

                                        </button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>

        </div>

    </div>

    <div class="card card-box mt-4">

        <div class="card-body">

            <h4 class="mb-4">

                Grafik Pembelian Produk

            </h4>

            <canvas id="grafikPembelian"></canvas>

        </div>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const ctx =
                document.getElementById('grafikPembelian');

            new Chart(ctx, {

                type: 'bar',

                data: {

                    labels: [

                        @foreach ($grafikLabel as $label)

                            '{{ $label }}',
                        @endforeach

                    ],

                    datasets: [{

                        label: 'Jumlah Pembelian',

                        data: [

                            @foreach ($grafikData as $data)

                                {{ $data }},
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

    <script>
        document.getElementById('searchInput')
            .addEventListener('keyup', function() {

                let keyword = this.value.toLowerCase();

                let produk = document.querySelectorAll('.produk-card');

                produk.forEach(function(card) {

                    let text = card.innerText.toLowerCase();

                    if (text.includes(keyword)) {

                        card.style.display = 'block';

                    } else {

                        card.style.display = 'none';

                    }

                });

            });
    </script>
@endsection
