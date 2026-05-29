<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Barryvdh\DomPDF\Facade\Pdf;

class RiwayatPesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::latest()->get();

        return view(
            'riwayat_pesanan',
            compact('pesanan')
        );
    }

    public function destroy($id)
    {
        $pesanan = Pesanan::find($id);

        $pesanan->delete();

        return redirect('/riwayat-pesanan')
            ->with(
                'success',
                'Riwayat berhasil dihapus'
            );
    }
    public function exportPdf()
    {
        $pesanan = Pesanan::latest()->get();

        $pdf = Pdf::loadView(
            'pdf.riwayat_pesanan_pdf',
            compact('pesanan')
        );

        return $pdf->download(
            'riwayat_pesanan.pdf'
        );
    }
}
