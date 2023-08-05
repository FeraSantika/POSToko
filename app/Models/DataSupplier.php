<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSupplier extends Model
{
    use HasFactory;
    public $table = 'data_supplier';
    protected $fillable = [
        'kode_supplier',
        'nama_supplier',
        'alamat_supplier',
        'telp_supplier',
    ];

    public function transaksibarangmasuk(){
        return $this->hasMany(Transaksi_barang_masuk::class, 'kode_supplier', 'kode_supplier');
    }
}
