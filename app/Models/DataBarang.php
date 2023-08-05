<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    use HasFactory;
    public $table = 'data_barang';
    protected $fillable = [
        'kode_barang',
        'kode_kategori',
        'nama_barang',
        'harga_jual',
        'diskon_barang',
        'stok_barang'
    ];

    public function kategori(){
        return $this->belongsTo(kategori::class, 'kode_kategori', 'kode_kategori');
    }

    public function listbarangkeluar(){
        return $this->hasMany(List_barang_keluar::class, 'kode_barang', 'kode_barang');
    }

    public function listbarangmasuk(){
        return $this->hasMany(List_barang_masuk::class, 'kode_barang', 'kode_barang');
    }
}
