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
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->id('id_kontrak');
            $table->string('contract_name', 45);
            $table->string('instansi', 45);
            $table->date('tanggal_keluar');
            $table->string('email', 45)->nullable();
            $table->string('keterangan', 255)->nullable();
            $table->string('no_surat', 255)->nullable();
            $table->date('tenggat')->nullable();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_keluar');
    }
};
