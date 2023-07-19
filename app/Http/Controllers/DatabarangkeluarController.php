<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use Illuminate\Http\Request;

class DatabarangkeluarController extends Controller
{
    public function index(){
        return view('transaksi.barangkeluar.barangkeluar');
    }

    public function search(Request $request)
    {
        $term = $request->get('query');
        $results = DataBarang::where('nama_barang', 'LIKE', '%'.$term.'%')->pluck('nama_barang');
        return response()->json($results);
    }
}
