<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Sum;

class Transaksi_barang_keluar extends Model
{
    use HasFactory;
    public $table = 'transaksi_barang_keluar';
    protected $fillable = [
        'kode_transaksi',
        'kode_kasir',
        'tanggal_tbk',
        'customer',
        'diskon_tbk',
        'total_bayar',
        'dibayar',
        'kembalian',
    ];

    public function user()
    {
        return $this->belongsTo(DataUser::class, 'kode_kasir', 'User_id');
    }

    public function list()
    {
        return $this->hasMany(List_barang_keluar::class, 'kode_transaksi', 'kode_transaksi')->groupBy('kode_barang')->with('barang');
    }


}
