<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukPasarController;
use App\Http\Controllers\RiwayatPembelianController;

Route::get('/', [ProdukPasarController::class, 'index']);

Route::post('/pesan',
[ProdukPasarController::class, 'pesan']);

Route::get('/riwayat-pembelian', [RiwayatPembelianController::class, 'index']);

Route::delete('/pembelian/{id}', [RiwayatPembelianController::class, 'destroy']);