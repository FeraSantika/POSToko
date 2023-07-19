<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('list_barang_keluar', function (Blueprint $table) {
            $table->bigIncrements('kode_barang');
            $table->integer('kode_transaksi');
            $table->integer('jumlah_bk');
            $table->integer('harga_jual');
            $table->boolean('diskon_bk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_barang_keluars');
    }
};
