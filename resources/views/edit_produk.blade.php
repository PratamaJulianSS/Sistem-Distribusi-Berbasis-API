@extends('layout.app')

@section('content')

    <div class="card card-box">

        <div class="card-body">

            <h3 class="mb-4">
                Edit Produk
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

            <form action="/produk/update/{{ $produk->id }}" method="POST">

                @csrf

                <div class="mb-3">

                    <label>Nama Produk</label>

                    <input type="text" name="nama_produk" class="form-control" value="{{ $produk->nama_produk }}">

                </div>

                <div class="mb-3">

                    <label>Stok</label>

                    <input type="number" name="stok" class="form-control" value="{{ $produk->stok }}">

                </div>

                <button type="submit" class="btn btn-primary">

                    Update

                </button>

                <a href="/produk" class="btn btn-secondary">

                    <i class="bi bi-arrow-left"></i>
                    Kembali

                </a>

                </button>

            </form>

        </div>

    </div>

@endsection
