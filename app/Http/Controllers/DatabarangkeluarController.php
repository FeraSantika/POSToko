<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\DataUser;
use App\Models\DataBarang;
use Illuminate\Http\Request;
use App\Models\List_barang_keluar;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaksi_barang_keluar;
use Illuminate\Support\Facades\Validator;

class DatabarangkeluarController extends Controller
{
    public function index()
    {
        $dtbarang = DataBarang::first();
        $prefix = 'TK';
        $length = 4;
        $lastTransaction = Transaksi_barang_keluar::orderBy('kode_transaksi', 'desc')->first();

        if ($lastTransaction) {
            $lastId = (int) substr($lastTransaction->kode_transaksi, strlen($prefix));
        } else {
            $lastId = 0;
        }

        $nextId = $lastId + 1;

        $paddedId = str_pad($nextId, $length, '0', STR_PAD_LEFT);
        $transactionCode = $prefix . $paddedId;

        $listbarang = List_barang_keluar::with('barang')->get();

        return view('transaksi.barangkeluar', compact('transactionCode', 'lastTransaction', 'dtbarang', 'listbarang'));
    }

    public function autocomplete(Request $request)
    {
        $data = DataBarang::select("nama_barang as value", "kode_barang")
            ->where('nama_barang', 'LIKE', '%' . $request->get('cari') . '%')
            ->get();

        return response()->json($data);
    }

    public function insertlist(Request $request)
    {
        $dataBarang = DataBarang::where('nama_barang', $request->search)->first();
        if ($dataBarang) {
            try {
                $listbarangkeluar = List_barang_keluar::create([
                    'kode_barang' => $dataBarang->kode_barang,
                    'kode_transaksi' => $request->kode_transaksi,
                    'jumlah_bk' => 1,
                    'harga_jual' => $dataBarang->harga_jual,
                    'diskon_bk' => $dataBarang->diskon_barang,
                ]);
                $description_data = array(
                    'kode' => $dataBarang->kode_barang,
                    'nama' => $dataBarang->nama_barang,
                    'qty' => 1,
                    'diskon' => $dataBarang->diskon_barang,
                    'harga' => $dataBarang->harga_jual,
                    'jumlah' => ($dataBarang->harga_jual * 1) - ($dataBarang->harga_jual * 1 * $dataBarang->diskon_barang / 100),
                    'list_id' => $listbarangkeluar->id,
                );
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Disimpan!',
                    'data'    =>  $description_data
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to insert data: ' . $e->getMessage(),
                ]);
            }
        }
    }

    public function store(Request $request)
    {
        $kasir = Auth::user()->User_id;
        $tanggal = Carbon::createFromFormat('Y-m-d', $request->tanggal);
        $transaksi_bk = Transaksi_barang_keluar::create([
            "kode_transaksi" => $request->kode_transaksi,
            "kode_kasir" => $kasir,
            "tanggal_tbk" => $tanggal,
            "customer" => $request->customer,
            "diskon_tbk" => $request->diskon,
            "total_bayar" => $request->total_bayar,
            "dibayar" => $request->jumlah_uang,
            "kembalian" => $request->kembali
        ]);

        $prefix = 'TK';
        $length = 4;
        $lastTransaction = Transaksi_barang_keluar::orderBy('kode_transaksi', 'desc')->first();
        if ($lastTransaction) {
            $lastId = (int) substr($lastTransaction->kode_transaksi, strlen($prefix));
        } else {
            $lastId = 0;
        }
        $nextId = $lastId + 1;
        $paddedId = str_pad($nextId, $length, '0', STR_PAD_LEFT);
        $newTransactionCode = $prefix . $paddedId;

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data' => $transaksi_bk,
            'new_kode_transaksi' => $newTransactionCode
        ]);
    }

    public function updatelist(Request $request)
    {
        $post = List_barang_keluar::where('list_id', $request->list_id)->update([
            'jumlah_bk' => $request->qty,
        ]);

        $post = List_barang_keluar::where('list_id', $request->list_id)->first();
        $barang = DataBarang::where('kode_barang', $post->kode_barang)->first();

        $description_data = array(
            'kode' => $post->kode_barang,
            'nama' => $barang->nama_barang,
            'qty' => $post->jumlah_bk,
            'diskon' => $post->diskon_bk,
            'harga' => $post->harga_jual,
            'jumlah' => ($post->harga_jual * $post->jumlah_bk) - ($post->harga_jual * $post->jumlah_bk * $post->diskon_bk / 100),
            'list_id' => $post->list_id,
        );

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data' => $description_data
        ]);
    }

    public function destroy($list_id)
    {
        $listbarang = List_barang_keluar::where('list_id', $list_id);
        $listbarang->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data Post Berhasil Dihapus!.',
            'data' => $listbarang,
        ]);
    }
}
