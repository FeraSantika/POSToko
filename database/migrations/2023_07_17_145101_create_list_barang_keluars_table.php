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
            $table->bigIncrements('list_id');
            $table->char('kode_transaksi');
            $table->integer('kode_barang');
            $table->integer('jumlah_bk');
            $table->integer('harga_jual');
            $table->integer('diskon_bk')->nullable();
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
