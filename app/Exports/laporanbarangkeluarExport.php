<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use App\Models\Transaksi_barang_keluar;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Symfony\Component\HttpFoundation\Request;
use Maatwebsite\Excel\Concerns\FromCollection;

class laporanbarangkeluarExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

     public $tglAwal;
     public $tglAkhir;

    function __construct($tglAwal, $tglAkhir)
    {
        $this->tglAwal = $tglAwal;
        $this->tglAkhir = $tglAkhir;
    }

    public function collection()
    {
        $data = Transaksi_barang_keluar::where('tanggal_tbk', [$this->tglAwal, $this->tglAkhir])->with('user')->get();
        $formattedData = collect($data)->map(function ($item) {
            return [
                $item->kode_transaksi,
                $item->tanggal_tbk,
                optional($item->user)->User_name ?? 'N/A',
                $item->customer,
                $item->diskon_tbk,
                $item->total_bayar,
                $item->dibayar,
                $item->kembalian,
            ];
        });

        return $formattedData;
    }

    public function headings(): array
    {
        return [
            'Kode Transaksi',
            'Tanggal',
            'Nama Kasir',
            'Customer',
            'Diskon',
            'Jumlah Bayar',
            'Dibayar',
            'Kembalian',
        ];
    }
}
