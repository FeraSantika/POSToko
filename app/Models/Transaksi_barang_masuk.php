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
        'kode_supplier',
        'harga_total'
    ];

    public function supplier(){
        return $this->belongsTo(DataSupplier::class, 'kode_supplier', 'kode_supplier');
    }

    public function list(){
        return $this->hasMany(List_barang_masuk::class, 'kode_transaksi', 'kode_transaksi')->groupBy('kode_barang')->with('barang');
    }
}
