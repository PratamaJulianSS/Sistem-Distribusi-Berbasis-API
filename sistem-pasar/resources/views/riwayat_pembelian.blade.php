@extends('layout.app')

@section('content')
    <h2 class="mb-4">
        Riwayat Pembelian
    </h2>

    <div class="card card-box">
        <div class="card-body">

            <table class="table table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @forelse($pembelian as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->nama_produk }}</td>
                            <td>{{ $p->jumlah }}</td>
                            <td>{{ $p->created_at->format('d-m-Y H:i') }}</td>
                            <td>
                                <form action="{{ url('/pembelian/' . $p->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin hapus riwayat ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                Belum ada pembelian
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
@endsection
