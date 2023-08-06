<?php

namespace App\Exports;

use App\Models\Transaksi_barang_masuk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class laporanbarangmasukExport implements FromCollection, WithHeadings
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
        $data = Transaksi_barang_masuk::whereBetween('tanggal_tbm', [$this->tglAwal, $this->tglAkhir])->with('supplier')->get();
        $formattedData = collect($data)->map(function ($item) {
            return [
                $item->kode_transaksi,
                $item->tanggal_tbm,
                optional($item->supplier)->nama_supplier ?? 'N/A',
                $item->harga_total,
            ];
        });

        return $formattedData;
    }

    public function headings(): array
    {
        return [
            'Kode Transaksi',
            'Tanggal',
            'Supplier',
            'Total'
        ];
    }
}
