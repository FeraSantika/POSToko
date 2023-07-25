<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class List_barang_masuk extends Model
{
    use HasFactory;
    public $table = 'list_barang_masuk';
    protected $fillable = [
        'list_id',
        'kode_transaksi',
        'kode_barang',
        'harga_jual',
        'harga_beli',
        'jumlah_bm'
    ];
}
