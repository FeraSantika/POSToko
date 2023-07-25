<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class List_barang_keluar extends Model
{
    use HasFactory;
    public $table = 'list_barang_keluar';
    protected $fillable = [
        'list_id',
        'kode_transaksi',
        'kode_barang',
        'jumlah_bk',
        'harga_jual',
        'diskon_bk',
    ];

    public function barang(){
        return $this->belongsTo(DataBarang::class, 'kode_barang', 'kode_barang');
    }
}
