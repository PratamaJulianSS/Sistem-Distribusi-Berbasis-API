<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;

class RiwayatPembelianController extends Controller
{
    public function index()
    {
        $pembelian = Pembelian::latest()->get();

        return view('riwayat_pembelian', compact('pembelian'));
    }

    public function destroy($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->delete();

        return redirect('/riwayat-pembelian')
            ->with('success', 'Riwayat pembelian berhasil dihapus');
    }
}