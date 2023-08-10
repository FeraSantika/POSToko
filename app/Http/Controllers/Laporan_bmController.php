<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Http\Request;
use App\Models\List_barang_masuk;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\laporanbarangmasukExport;

class Laporan_bmController extends Controller
{
    public function index()
    {
        $bm = List_barang_masuk::leftJoin('transaksi_barang_masuk', 'transaksi_barang_masuk.kode_transaksi', '=', 'list_barang_masuk.kode_transaksi')
            ->selectRaw('list_barang_masuk.*, sum(list_barang_masuk.jumlah_bm) as jumlahbm')
            ->groupBy('list_barang_masuk.kode_barang')->with('barang', 'barang.kategori')
            ->get();
        $groupedBm = $bm->groupBy('kode_barang');
        return view('laporan_bm.laporan_bm', compact('groupedBm', 'bm'));
    }

    public function getDataByDate(Request $request)
    {
        $tglAwal = $request->input('tanggalAwal');
        $tglAkhir = $request->input('tanggalAkhir');
        $dataTerfilter = List_barang_masuk::leftJoin('transaksi_barang_masuk', 'transaksi_barang_masuk.kode_transaksi', '=', 'list_barang_masuk.kode_transaksi')
            ->selectRaw('list_barang_masuk.*, sum(list_barang_masuk.jumlah_bm) as jumlahbm')->whereBetween('tanggal_tbm', [$tglAwal, $tglAkhir])
            ->groupBy('list_barang_masuk.kode_barang')->with('barang', 'barang.kategori')
            ->get();
        return response()->json($dataTerfilter);
    }

    public function export(Request $request)
    {
        $tglAwal = $request->input('tanggalAwal');
        $tglAkhir = $request->input('tanggalAkhir');
        return Excel::download(new laporanbarangmasukExport($tglAwal, $tglAkhir), 'Laporan_Barang_Masuk.xlsx');
    }

    public function exportPDF(Request $request)
    {
        $tglAwal = $request->input('tanggalAwal');
        $tglAkhir = $request->input('tanggalAkhir');

        if ($tglAwal && $tglAkhir) {
            $bm = List_barang_masuk::leftJoin('transaksi_barang_masuk', 'transaksi_barang_masuk.kode_transaksi', '=', 'list_barang_masuk.kode_transaksi')
                ->selectRaw('list_barang_masuk.*, sum(list_barang_masuk.jumlah_bm) as jumlahbm')->whereBetween('tanggal_tbm', [$tglAwal, $tglAkhir])
                ->groupBy('list_barang_masuk.kode_barang')->with('barang', 'barang.kategori')
                ->get();
        } else {
            $bm = List_barang_masuk::leftJoin('transaksi_barang_masuk', 'transaksi_barang_masuk.kode_transaksi', '=', 'list_barang_masuk.kode_transaksi')
                ->selectRaw('list_barang_masuk.*, sum(list_barang_masuk.jumlah_bm) as jumlahbm')
                ->groupBy('list_barang_masuk.kode_barang')->with('barang', 'barang.kategori')
                ->get();
        }

        $view = view('laporan_bm.exportpdf', compact('bm'))->render();
        $pdf = new Dompdf();
        $pdf->loadHtml($view);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        $pdfContent = $pdf->output();

        $pdfFilePath = 'path_to_save.pdf';
        \Illuminate\Support\Facades\Storage::put($pdfFilePath, $pdfContent);

        return $pdf->stream('Laporan_Barang_Masuk.pdf');
    }
}
