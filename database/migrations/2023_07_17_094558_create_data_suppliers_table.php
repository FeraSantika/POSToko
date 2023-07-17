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
        Schema::create('data_supplier', function (Blueprint $table) {
            $table->bigIncrements('kode_supplier');
            $table->string('nama_supplier');
            $table->char('alamat_supplier');
            $table->integer('nohp_supplier');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_suppliers');
    }
};
