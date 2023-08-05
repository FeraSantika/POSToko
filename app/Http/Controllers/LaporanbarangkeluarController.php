<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Transaksi_barang_keluar;
use App\Exports\laporanbarangkeluarExport;

class LaporanbarangkeluarController extends Controller
{
    public function index()
    {
        $dtbarangkeluar = Transaksi_barang_keluar::with('user')->get();
        return view('Laporanbarangkeluar.laporanbarangkeluar', compact('dtbarangkeluar'));
    }

    public function getDataByDate(Request $request)
    {
        $tglAwal = $request->input('tanggalAwal');
        $tglAkhir = $request->input('tanggalAkhir');
        $dataTerfilter = Transaksi_barang_keluar::whereBetween('tanggal_tbk', [$tglAwal, $tglAkhir])->with('user')->get();
        return response()->json($dataTerfilter);
    }

    public function export(Request $request){
        $tglAwal = $request->input('tanggalAwal');
        $tglAkhir = $request->input('tanggalAkhir');
        return Excel::download(new laporanbarangkeluarExport($tglAwal, $tglAkhir), 'Laporanbarangkeluar.xlsx');
    }
}
