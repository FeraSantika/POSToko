<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $dtbarang = DataBarang::with('kategori')->get();
        return view('barang.barang', compact('dtbarang'));
    }

    public function create()
    {
        $dtkategori = kategori::get();
        return view('barang.create', compact('dtkategori'));
    }

    public function store(Request $request)
    {
        DataBarang::create([
            'nama_barang' => $request->nama,
            'kode_kategori' => $request->kategori,
            'harga_jual' => $request->hargajual,
            'diskon_barang' => $request->diskon,
            'stok_barang' => $request->stok,
        ]);
        return redirect()->route('barang');
    }

    public function edit($kode_barang)
    {
        $dtkategori = kategori::get();
        $dtbarang = DataBarang::where('kode_barang', $kode_barang)->get();
        return view('barang.edit', compact('dtbarang', 'dtkategori'));
    }

    public function update(Request $request, $kode_barang)
    {
        DataBarang::where('kode_barang', $kode_barang)->update([
            'nama_barang' => $request->nama,
            'kode_kategori' => $request->kategori,
            'harga_jual' => $request->hargajual,
            'diskon_barang' => $request->diskon,
            'stok_barang' => $request->stok,
        ]);
        return redirect()->route('barang');
    }

    public function destroy($kode_barang)
    {
        DataBarang::where('kode_barang', $kode_barang)->delete();
        return redirect()->route('barang');
    }
}
