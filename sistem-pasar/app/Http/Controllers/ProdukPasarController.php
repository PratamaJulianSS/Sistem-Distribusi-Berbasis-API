<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Pembelian;

class ProdukPasarController extends Controller
{
    public function index()
    {
        $response = Http::get(
            'http://127.0.0.1:8000/api/stok'
        );

        $produk = $response->json();

        $totalProduk = count($produk);

        $totalStok = collect($produk)->sum('stok');

        $totalPembelian = Pembelian::sum('jumlah');

        $totalTransaksi = Pembelian::count();

        $grafikLabel = Pembelian::select('nama_produk')
            ->groupBy('nama_produk')
            ->pluck('nama_produk');

        $grafikData = Pembelian::selectRaw(
            'SUM(jumlah) as total'
        )
            ->groupBy('nama_produk')
            ->pluck('total');

        return view('produk_pasar', compact(

            'produk',
            'totalProduk',
            'totalStok',
            'totalPembelian',
            'totalTransaksi',
            'grafikLabel',
            'grafikData'

        ));
    }

    public function pesan(Request $request)
    {
        $response = Http::post(
            'http://127.0.0.1:8000/api/pesan',
            [
                'id' => $request->id,
                'jumlah' => $request->jumlah
            ]
        );

        $produk = collect(
            Http::get(
                'http://127.0.0.1:8000/api/stok'
            )->json()
        )->firstWhere('id', $request->id);

        Pembelian::create([

            'nama_produk' => $produk['nama_produk'],

            'jumlah' => $request->jumlah

        ]);

        return redirect('/')
            ->with(
                'success',
                $response['message']
            );
    }

    public function hapusPembelian($id)
    {
        Pembelian::findOrFail($id)
            ->delete();

        return redirect('/riwayat')
            ->with(
                'success',
                'Riwayat pembelian berhasil dihapus'
            );
    }
}
