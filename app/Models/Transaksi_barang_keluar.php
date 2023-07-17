<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_barang_keluar extends Model
{
    use HasFactory;
    public $table = 'transaksi_barang_keluar';
    protected $fillable = [
        'kode_transaksi',
        'kode_kasir',
        'tanggal',
        'customer',
        'diskon',
        'total_bayar',
        'dibayar',
        'kembalian',
    ];
}
