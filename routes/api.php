<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProdukController;

Route::get('/stok', [ProdukController::class, 'index']);

Route::post('/pesan', [ProdukController::class, 'pesan']);