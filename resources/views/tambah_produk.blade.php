@extends('layout.app')

@section('content')

    <div class="card card-box">

        <div class="card-body">

            <h3 class="mb-4">
                Tambah Produk
            </h3>

            @if ($errors->any())
                <div class="alert alert-danger">

                    <ul>

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>
            @endif

            <form action="/produk/store" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="mb-3">

                    <label>Nama Produk</label>

                    <input type="text" name="nama_produk" class="form-control">

                </div>

                <div class="mb-3">

                    <label>Stok</label>

                    <input type="number" name="stok" class="form-control">

                </div>

                <div class="mb-3">

                    <label>Gambar Produk</label>

                    <input type="file" name="gambar" class="form-control">

                </div>

                <button type="submit" class="btn btn-success">

                    Simpan

                </button>

                <a href="/produk" class="btn btn-secondary">

                    <i class="bi bi-arrow-left"></i>
                    Kembali

                </a>

            </form>


        </div>

    </div>

@endsection
