<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_barang_masuk extends Model
{
    use HasFactory;
    public $table = 'transaksi_barang_masuk';
    protected $fillable = [
        'kode_transaksi',
        'tanggal_tbm',
        'kode_supplier'
    ];
}
