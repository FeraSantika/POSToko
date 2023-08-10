<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Transaksi_barang_masuk;
use App\Exports\laporantransaksibmExport;
use Dompdf\Dompdf;

class Laporantransaksi_bmController extends Controller
{
    public function index()
    {
        $dtbarangmasuk = Transaksi_barang_masuk::with('supplier')->get();
        return view('laporantransaksi_bm.laporantransaksi_bm', compact('dtbarangmasuk'));
    }

    public function getDataByDate(Request $request)
    {
        $tanggalAwal = $request->input('tanggalAwal');
        $tanggalAkhir = $request->input('tanggalAkhir');
        $dataTerfilter = Transaksi_barang_masuk::whereBetween('tanggal_tbm', [$tanggalAwal, $tanggalAkhir])->with('supplier')->get();
        return response()->json($dataTerfilter);
    }

    public function export(Request $request)
    {
        $tglAwal = $request->input('tanggalAwal');
        $tglAkhir = $request->input('tanggalAkhir');
        return Excel::download(new laporantransaksibmExport($tglAwal, $tglAkhir), 'Laporanbarangmasuk.xlsx');
    }

    public function exportPDF(Request $request)
    {
        $tglAwal = $request->input('tanggalAwal');
        $tglAkhir = $request->input('tanggalAkhir');

        if ($tglAwal && $tglAkhir) {
            $dtbarangmasuk = Transaksi_barang_masuk::whereBetween('tanggal_tbm', [$tglAwal, $tglAkhir])->with('supplier')->get();
        } else {
            $dtbarangmasuk = Transaksi_barang_masuk::with('supplier')->get();
        }

        $view = view('laporantransaksi_bm.exportpdf', compact('dtbarangmasuk'))->render();
        $pdf = new Dompdf();
        $pdf->loadHtml($view);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        $pdfContent = $pdf->output();

        $pdfFilePath = 'path_to_save.pdf';
        \Illuminate\Support\Facades\Storage::put($pdfFilePath, $pdfContent);

        return $pdf->stream('Laporan_Transaksi_Barang_Masuk.pdf');
    }
}
