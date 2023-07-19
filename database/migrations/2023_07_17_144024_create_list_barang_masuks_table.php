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
        Schema::create('list_barang_masuk', function (Blueprint $table) {
            $table->bigIncrements('kode_barang');
            $table->integer('kode_transaksi');
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->integer('jumlah_bm');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_barang_masuks');
    }
};
