<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use App\Models\Pesanan;

class ProdukController extends Controller
{
    public function index()
    {
        return response()->json(
            Produk::all()
        );
    }

    public function pesan(Request $request)
    {
        $produk = Produk::find($request->id);

        if (!$produk) {

            return response()->json([
                'message' => 'Produk tidak ditemukan'
            ], 404);
        }

        if ($produk->stok < $request->jumlah) {

            return response()->json([
                'message' => 'Stok tidak cukup'
            ], 400);
        }

        $produk->stok =
            $produk->stok - $request->jumlah;

        $produk->save();
        Pesanan::create([

            'nama_produk' => $produk->nama_produk,

            'jumlah' => $request->jumlah

        ]);

        return response()->json([

            'message' => 'Pesanan berhasil',

            'sisa_stok' => $produk->stok

        ]);
    }
}
