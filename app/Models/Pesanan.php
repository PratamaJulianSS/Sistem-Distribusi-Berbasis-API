<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'riwayat_pesanan';

    protected $fillable = [

        'nama_produk',
        'jumlah'

    ];
}