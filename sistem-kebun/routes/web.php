<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukWebController;
use App\Http\Controllers\RiwayatPesananController;

Route::get('/dashboard', [ProdukWebController::class, 'dashboard']);

Route::get('/produk', [ProdukWebController::class, 'index']);

Route::get('/produk/tambah', [ProdukWebController::class, 'create']);

Route::post('/produk/store', [ProdukWebController::class, 'store']);

Route::get('/produk/edit/{id}', [ProdukWebController::class, 'edit']);

Route::post('/produk/update/{id}', [ProdukWebController::class, 'update']);

Route::get('/produk/hapus/{id}', [ProdukWebController::class, 'destroy']);

Route::get(
    '/riwayat-pesanan',
    [RiwayatPesananController::class, 'index']
);

Route::get(

    '/riwayat-pesanan/hapus/{id}',

    [RiwayatPesananController::class, 'destroy']

);

Route::get(

    '/riwayat-pesanan/pdf',

    [RiwayatPesananController::class, 'exportPdf']

);