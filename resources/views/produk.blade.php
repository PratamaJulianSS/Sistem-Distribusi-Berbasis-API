@extends('layout.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">

        <h2>Data Produk</h2>

        <a href="/produk/tambah" class="btn btn-success">
            <i class="bi bi-plus-circle"></i>
            Tambah Produk
        </a>

    </div>

    <div class="d-flex justify-content-between mb-4">

        <input type="text" id="searchInput" class="form-control w-50" placeholder="Cari produk...">

        <button class="btn btn-danger" id="filterStok">

            Stok Menipis

        </button>

    </div>

    <div class="card card-box">

        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success">

                    {{ session('success') }}

                </div>
            @endif

            <div class="row">

                @foreach ($produk as $p)
                    <div class="col-md-4 mb-4 produk-card" data-stok="{{ $p->stok }}">

                        <div class="card shadow border-0 rounded-4 h-100">

                            <!-- Gambar -->
                            @if ($p->gambar)
                                <img src="{{ asset('gambar_produk/' . $p->gambar) }}" class="card-img-top"
                                    style="
                    height:250px;
                    object-fit:cover;
                ">
                            @else
                                <img src="https://via.placeholder.com/300x250" class="card-img-top">
                            @endif

                            <div class="card-body">

                                <h4 class="fw-bold">

                                    {{ $p->nama_produk }}

                                </h4>

                                <span class="badge bg-success mb-3">

                                    Stok:
                                    {{ $p->stok }}

                                </span>

                                <div class="d-flex gap-2">

                                    <a href="/produk/edit/{{ $p->id }}" class="btn btn-warning w-50">

                                        Edit

                                    </a>

                                    <a href="/produk/hapus/{{ $p->id }}" class="btn btn-danger w-50"
                                        onclick="return confirm(
                        'Yakin hapus produk?'
                        )">

                                        Hapus

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>

        </div>

    </div>

    <script>

document.addEventListener("DOMContentLoaded", function () {

    const searchInput =
    document.getElementById('searchInput');

    const filterBtn =
    document.getElementById('filterStok');

    const cards =
    document.querySelectorAll('.produk-card');

    // SEARCH PRODUK
    searchInput.addEventListener('keyup', function () {

        let keyword =
        this.value.toLowerCase();

        cards.forEach(function(card) {

            let namaProduk =
            card.querySelector('h4')
            .innerText.toLowerCase();

            if(namaProduk.includes(keyword)) {

                card.style.display = 'block';

            } else {

                card.style.display = 'none';

            }

        });

    });

    // FILTER STOK MENIPIS
    filterBtn.addEventListener('click', function () {

        cards.forEach(function(card) {

            let stok =
            parseInt(card.dataset.stok);

            if(stok < 20) {

                card.style.display = 'block';

            } else {

                card.style.display = 'none';

            }

        });

    });

});

</script> 
@endsection
