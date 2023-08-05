<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\DataBarang;
use App\Models\DataSupplier;
use Illuminate\Http\Request;
use App\Models\List_barang_masuk;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaksi_barang_masuk;

class DatabarangmasukController extends Controller
{
    public function index()
    {
        $dtbarangmasuk = Transaksi_barang_masuk::with('supplier')->get();
        return view('transaksibarangmasuk.barangmasuk', compact('dtbarangmasuk'));
    }

    public function create()
    {
        $dtsupplier = DataSupplier::get();
        $dtbarang = DataBarang::get();
        $prefix = 'TM';
        $length = 4;
        $lastTransaction = Transaksi_barang_masuk::orderBy('kode_transaksi', 'desc')->first();

        if ($lastTransaction) {
            $lastId = (int) substr($lastTransaction->kode_transaksi, strlen($prefix));
        } else {
            $lastId = 0;
        }

        $nextId = $lastId + 1;

        $paddedId = str_pad($nextId, $length, '0', STR_PAD_LEFT);
        $transactionCode = $prefix . $paddedId;

        $listbarang = List_barang_masuk::with('barang')->get();

        return view('transaksibarangmasuk.createbarangmasuk', compact('transactionCode', 'lastTransaction', 'dtsupplier', 'dtbarang', 'listbarang'));
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
                $listbarangmasuk = List_barang_masuk::create([
                    'kode_barang' => $dataBarang->kode_barang,
                    'kode_transaksi' => $request->kode_transaksi,
                    'jumlah_bm' => 1,
                    'harga_jual' => $dataBarang->harga_jual,
                    'harga_beli' => 0,
                ]);
                $description_data = array(
                    'kode' => $dataBarang->kode_barang,
                    'nama' => $dataBarang->nama_barang,
                    'qty' => 1,
                    'hargabeli' => 1,
                    'hargajual' => $dataBarang->harga_jual,
                    'jumlah' => ($dataBarang->harga_jual * 1),
                    'list_id' => $listbarangmasuk->id,
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

    public function updatelist(Request $request)
    {
        $post = List_barang_masuk::where('list_id', $request->list_id)->update([
            'jumlah_bm' => $request->qty,
            'harga_beli' => $request->hargabeli,
        ]);

        $post = List_barang_masuk::where('list_id', $request->list_id)->first();
        $barang = DataBarang::where('kode_barang', $post->kode_barang)->first();
        $jumlah = $post->jumlah_bm * $post->harga_beli;

        $description_data = array(
            'kode' => $post->kode_barang,
            'nama' => $barang->nama_barang,
            'qty' => $post->jumlah_bm,
            'hargabeli' => $post->harga_beli,
            'hargajual' => $post->harga_jual,
            'jumlah' => $jumlah,
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
        $listbarang = List_barang_masuk::where('list_id', $list_id);
        $listbarang->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data Post Berhasil Dihapus!.',
            'data' => $listbarang,
        ]);
    }

    public function store(Request $request)
    {
        $tanggal = Carbon::createFromFormat('Y-m-d', $request->tanggal);
        $transaksi_bm = Transaksi_barang_masuk::create([
            "kode_transaksi" => $request->kode_transaksi,
            "kode_supplier" => $request->supplier,
            "tanggal_tbm" => $tanggal,
            "harga_total" => $request->grand_total,
        ]);

        $prefix = 'TM';
        $length = 4;
        $lastTransaction = Transaksi_barang_masuk::orderBy('kode_transaksi', 'desc')->first();
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
            'data' => $transaksi_bm,
            'new_kode_transaksi' => $newTransactionCode
        ]);
    }

    public function detail($id){
        $transaksi_bm = Transaksi_barang_masuk::where('kode_transaksi', $id)->with('list', 'supplier')->first();
        return view('transaksibarangmasuk.detailbarangmasuk', compact('transaksi_bm'));
    }
}
