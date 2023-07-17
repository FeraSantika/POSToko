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
        Schema::create('transaksi_barang_masuk', function (Blueprint $table) {
            $table->bigIncrements('kode_transaksi');
            $table->date('tanggal');
            $table->integer('kode_supplier');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_barang_masuks');
    }
};
