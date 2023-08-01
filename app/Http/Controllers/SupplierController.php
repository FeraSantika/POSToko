<?php

namespace App\Http\Controllers;

use App\Models\DataSupplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $dtSupplier = DataSupplier::get();
        return view('supplier.supplier', compact('dtSupplier'));
    }

    public function create()
    {
        return view('supplier.create');
    }

    public function store(Request $request)
    {
        DataSupplier::create([
            'nama_supplier' => $request->nama,
            'alamat_supplier' => $request->alamat,
            'telp_supplier' => $request->telp
        ]);

        return redirect()->route('supplier');
    }

    public function edit($kode)
    {
        $dtSupplier = DataSupplier::where('kode_supplier', $kode)->first();
        return view('supplier.edit', compact('dtSupplier'));
    }

    public function update(Request $request, $kode)
    {
        DataSupplier::where('kode_supplier', $kode)->update([
            'nama_supplier' => $request->nama,
            'alamat_supplier' => $request->alamat,
            'telp_supplier' => $request->telp
        ]);
        return redirect()->route('supplier');
    }

    public function destroy($kode)
    {
        DataSupplier::where('kode_supplier', $kode)->delete();
        return redirect()->route('supplier');
    }
}
