<?php

namespace App\Http\Controllers;

use App\Exports\laporanbarangmasukExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Transaksi_barang_masuk;

class LaporanbarangmasukController extends Controller
{
    public function index()
    {
        $dtbarangmasuk = Transaksi_barang_masuk::with('supplier')->get();
        return view('Laporanbarangmasuk.laporanbarangmasuk', compact('dtbarangmasuk'));
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
        return Excel::download(new laporanbarangmasukExport($tglAwal, $tglAkhir), 'Laporanbarangmasuk.xlsx');
    }
}
