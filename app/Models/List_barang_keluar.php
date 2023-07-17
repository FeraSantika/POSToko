<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class List_barang_keluar extends Model
{
    use HasFactory;
    public $table = 'list_barang_keluar';
    protected $fillable = [
        'kode_barang',
        'kode_transaksi',
        'jumlah',
        'harga_jual',
        'diskon',
    ];
}
