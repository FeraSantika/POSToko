<?php

namespace App\Http\Controllers;


use App as Apps;
use Dompdf\Dompdf;
use Dompdf\Options;
use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Transaksi_barang_keluar;
use App\Exports\laporantransaksibkExport;
use App\Exports\laporantransaksibkExportPdf;

class Laporantransaksi_bkController extends Controller
{
    public function index()
    {
        $dtbarangkeluar = Transaksi_barang_keluar::with('user')->get();
        return view('laporantransaksi_bk.laporantransaksi_bk', compact('dtbarangkeluar'));
    }

    public function getDataByDate(Request $request)
    {
        $tglAwal = $request->input('tanggalAwal');
        $tglAkhir = $request->input('tanggalAkhir');
        $dataTerfilter = Transaksi_barang_keluar::whereBetween('tanggal_tbk', [$tglAwal, $tglAkhir])->with('user')->get();
        return response()->json($dataTerfilter);
    }

    public function export(Request $request)
    {
        $tglAwal = $request->input('tanggalAwal');
        $tglAkhir = $request->input('tanggalAkhir');
        return Excel::download(new laporantransaksibkExport($tglAwal, $tglAkhir), 'Laporan_Transaksi_Barang_Keluar.xlsx');
    }

    public function exportPDF(Request $request)
    {
        $tglAwal = $request->input('tanggalAwal');
        $tglAkhir = $request->input('tanggalAkhir');

        if ($tglAwal && $tglAkhir){
            $dtbarangkeluar = Transaksi_barang_keluar::whereBetween('tanggal_tbk', [$tglAwal, $tglAkhir])->with('user')->get();
        }else{
            $dtbarangkeluar = Transaksi_barang_keluar::with('user')->get();
        }

        $view = view('laporantransaksi_bk.exportpdf', compact('dtbarangkeluar'))->render();
        $pdf = new Dompdf();
        $pdf->loadHtml($view); // Load the rendered HTML content
        $pdf->setPaper('A4', 'portrait');
        $pdf->render(); // Render the PDF content

        $pdfContent = $pdf->output();

        $pdfFilePath = 'path_to_save.pdf';
        \Illuminate\Support\Facades\Storage::put($pdfFilePath, $pdfContent);

        return $pdf->stream('Laporan_Transaksi_Barang_Keluar.pdf');
    }
}
