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
        Schema::create('transaksi_barang_keluar', function (Blueprint $table) {
            $table->bigIncrements('kode_transaksi');
            $table->integer('kode_kasir');
            $table->date('tanggal_tbk');
            $table->string('customer');
            $table->boolean('diskon_tbk');
            $table->integer('total_bayar');
            $table->integer('dibayar');
            $table->integer('kembalian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_barang_keluars');
    }
};
