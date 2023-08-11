<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Http\Request;
use App\Models\List_barang_keluar;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\laporanbarangkeluarExport;

class Laporan_bkController extends Controller
{
    public function index()
    {
        $bk = List_barang_keluar::leftJoin('transaksi_barang_keluar', 'transaksi_barang_keluar.kode_transaksi', '=', 'list_barang_keluar.kode_transaksi')
            ->selectRaw('list_barang_keluar.*, sum(list_barang_keluar.jumlah_bk) as jumlahbk')
            ->groupBy('list_barang_keluar.kode_barang')->with('barang', 'barang.kategori')
            ->get();
        $groupedBk = $bk->groupBy('kode_barang');
        // dd($bk);
        return view('laporan_bk.laporan_bk', compact('groupedBk', 'bk'));
    }


    public function getDataByDate(Request $request)
    {
        $tglAwal = $request->input('tanggalAwal');
        $tglAkhir = $request->input('tanggalAkhir');
        $dataTerfilter = List_barang_keluar::leftJoin('transaksi_barang_keluar', 'transaksi_barang_keluar.kode_transaksi', '=', 'list_barang_keluar.kode_transaksi')
            ->selectRaw('list_barang_keluar.*, sum(list_barang_keluar.jumlah_bk) as jumlahbk')->whereBetween('tanggal_tbk', [$tglAwal, $tglAkhir])
            ->groupBy('list_barang_keluar.kode_barang')->with('barang', 'barang.kategori')
            ->get();
        $groupedBk = $dataTerfilter->groupBy('kode_barang');
        return response()->json($dataTerfilter);
    }

    public function export(Request $request)
    {
        $tglAwal = $request->input('tanggalAwal');
        $tglAkhir = $request->input('tanggalAkhir');
        return Excel::download(new laporanbarangkeluarExport($tglAwal, $tglAkhir), 'Laporan_Barang_Keluar.xlsx');
    }

    public function exportPDF(Request $request)
    {
        $tglAwal = $request->input('tanggalAwal');
        $tglAkhir = $request->input('tanggalAkhir');

        if ($tglAwal && $tglAkhir) {
            $bk = List_barang_keluar::leftJoin('transaksi_barang_keluar', 'transaksi_barang_keluar.kode_transaksi', '=', 'list_barang_keluar.kode_transaksi')
                ->selectRaw('list_barang_keluar.*, sum(list_barang_keluar.jumlah_bk) as jumlahbk')->whereBetween('tanggal_tbk', [$tglAwal, $tglAkhir])
                ->groupBy('list_barang_keluar.kode_barang')->with('barang', 'barang.kategori')
                ->get();
        } else {
            $bk = List_barang_keluar::leftJoin('transaksi_barang_keluar', 'transaksi_barang_keluar.kode_transaksi', '=', 'list_barang_keluar.kode_transaksi')
                ->selectRaw('list_barang_keluar.*, sum(list_barang_keluar.jumlah_bk) as jumlahbk')
                ->groupBy('list_barang_keluar.kode_barang')->with('barang', 'barang.kategori')
                ->get();
        }

        $view = view('laporan_bk.exportpdf', compact('bk', 'tglAwal', 'tglAkhir'))->render();
        $pdf = new Dompdf();
        $pdf->loadHtml($view);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        $pdfContent = $pdf->output();

        $pdfFilePath = 'path_to_save.pdf';
        \Illuminate\Support\Facades\Storage::put($pdfFilePath, $pdfContent);

        return $pdf->stream('Laporan_Barang_Keluar.pdf');
    }
}
