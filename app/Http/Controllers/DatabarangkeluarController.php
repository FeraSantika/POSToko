<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\DataUser;
use App\Models\List_barang_keluar;
use App\Models\Transaksi_barang_keluar;
use Illuminate\Http\Request;
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
            // Extract the numeric part from the existing kode_transaksi (i.e., the part without the prefix) and convert it to an integer.
            $lastId = (int) substr($lastTransaction->kode_transaksi, strlen($prefix));
        } else {
            // Jika tidak ada transaksi sebelumnya, set $lastId ke 0.
            $lastId = 0;
        }

        // Padding nomor urutan dengan nol di depan
        $nextId = $lastId + 1;

        // Kombinasikan huruf dan nomor urutan
        $paddedId = str_pad($nextId, $length, '0', STR_PAD_LEFT);
        $transactionCode = $prefix . $paddedId;

        $listbarang = List_barang_keluar::with('barang')->get();

        return view('transaksi.barangkeluar.barangkeluar', compact('transactionCode', 'lastTransaction', 'dtbarang', 'listbarang'));
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
                    'jumlah' => $dataBarang->harga_jual * 1,
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
        // $lastTransaction = Transaksi_barang_keluar::orderBy('kode_transaksi', 'desc')->first();
        // if ($lastTransaction) {
        //     $lastId = (int) substr($lastTransaction->kode_transaksi, strlen($prefix));
        // } else {
        //     $lastId = 0;
        // }
        // // Padding nomor urutan dengan nol di depan
        // $nextId = $lastId + 1;
        // // Kombinasikan huruf dan nomor urutan
        // $paddedId = str_pad($nextId, $length, '0', STR_PAD_LEFT);
        // $transactionCode = $prefix . $paddedId;

        // $kasir = DataUser::where('user_id', auth()->user()->id)->first();

        // $validator = Validator::make($request->all(), [
        //     'kode_transaksi' => 'required',
        //     'kode_kasir' => 'required',
        //     'customer' => 'required|string',
        //     'tanggal_tbk' => 'required',
        //     'diskon_tbk' => 'required',
        //     'total_bayar' => 'required',
        //     'dibayar' => 'required',
        //     'kembalian' => 'required',
        // ]);
        //check if validation fails
        // if ($validator->fails()) {
        //     return response()->json($validator->errors(), 422);
        // }

        // if ($kasir) {
        //     $post = Transaksi_barang_keluar::create([
        //         'kode_transaksi' => $transactionCode,
        //         'kode_kasir' => $kasir->user_id,
        //         'customer' => $request->customer,
        //         'tanggal_tbk' => $request->tanggal,
        //         'diskon_tbk' => $request->diskon,
        //         'total_bayar' => $request->totalbayar,
        //         'dibayar' => $request->dibayar,
        //         'kembalian' => $request->kembalian,
        //     ]);

        // $databarang = List_barang_keluar::create([
        //     'kode_barang',
        //     'kode_transaksi',
        //     'jumlah_bk',
        //     'harga_jual',
        //     'diskon_bk'
        // ]);
        // }
        // $dataBarang = DataBarang::where('nama_barang', $request->search)->first();
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
            'jumlah' => $post->harga_jual * $post->jumlah_bk,
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
        //delete post by ID
        $listbarang = List_barang_keluar::where('list_id', $list_id);
        $listbarang->delete();
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Post Berhasil Dihapus!.',
            'data' => $listbarang,
        ]);
    }
}
