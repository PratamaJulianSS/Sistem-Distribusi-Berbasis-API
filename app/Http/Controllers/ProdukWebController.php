<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Models\Pesanan;


class ProdukWebController extends Controller
{

    // Dashboard
    public function dashboard()
    {
        $totalProduk = Produk::count();

        $totalStok = Produk::sum('stok');

        $stokSedikit =
            Produk::where('stok', '<', 20)->count();

        $produk = Produk::all();

        $pesanan = Pesanan::latest()->take(5)->get();

        return view('dashboard', compact(

            'totalProduk',
            'totalStok',
            'stokSedikit',
            'produk',
            'pesanan'

        ));
    }

    // Tampilkan semua produk
    public function index()
    {
        $produk = Produk::all();

        return view('produk', compact('produk'));
    }

    // Halaman tambah produk
    public function create()
    {
        return view('tambah_produk');
    }

    // Simpan produk
    public function store(Request $request)
    {
        $gambar = null;

        if ($request->hasFile('gambar')) {

            $gambar = time() . '.'
                . $request->gambar
                ->extension();

            $request->gambar->move(
                public_path('gambar_produk'),
                $gambar
            );
        }

        Produk::create([

            'nama_produk' =>
            $request->nama_produk,

            'stok' =>
            $request->stok,

            'gambar' =>
            $gambar

        ]);

        return redirect('/produk')
            ->with(
                'success',
                'Produk berhasil ditambahkan'
            );
    }

    // Halaman edit
    public function edit($id)
    {
        $produk = Produk::find($id);

        return view('edit_produk', compact('produk'));
    }

    // Update produk
    public function update(Request $request, $id)
    {

        // VALIDASI
        $request->validate([
            'nama_produk' => 'required',
            'stok' => 'required|numeric'
        ]);

        // CARI DATA
        $produk = Produk::find($id);

        // UPDATE
        $produk->update([
            'nama_produk' => $request->nama_produk,
            'stok' => $request->stok
        ]);

        // REDIRECT
        return redirect('/produk')
            ->with('success', 'Produk berhasil diupdate');
    }

    // Hapus produk
    public function destroy($id)
    {
        $produk = Produk::find($id);

        $produk->delete();

        return redirect('/produk')
            ->with('success', 'Produk berhasil dihapus');
    }
}
