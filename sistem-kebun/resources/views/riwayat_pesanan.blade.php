@extends('layout.app')

@section('content')
    <h2 class="mb-4">

        Riwayat Pemesanan

    </h2>

    <div class="card card-box">

        <div class="card-body">

            <a href="/riwayat-pesanan/pdf" class="btn btn-danger mb-3">

                Export PDF

            </a>

            <table class="table table-bordered table-hover">

                <thead class="table-success">

                    <tr>

                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>

                    </tr>

                </thead>

                @if (session('success'))
                    <div class="alert alert-success">

                        {{ session('success') }}

                    </div>
                @endif

                <tbody>

                    @forelse($pesanan as $p)
                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $p->nama_produk }}</td>

                            <td>{{ $p->jumlah }}</td>

                            <td>

                                {{ $p->created_at->format('d-m-Y H:i') }}

                            </td>

                            <td>

                                <a href="/riwayat-pesanan/hapus/{{ $p->id }}" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus riwayat?')">

                                    Hapus

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="text-center">

                                Belum ada transaksi

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
@endsection
