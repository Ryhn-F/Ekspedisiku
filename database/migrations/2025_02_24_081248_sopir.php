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
        Schema::create('sopirs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sopir');
            $table->string('kepala_bagian');
            $table->string('plat_no')->unique();
            $table->string('tujuan');
            $table->string('no_telp');
            $table->string('muatan');
            $table->date('tgl_berangkat');
            $table->text('keterangan');
            $table->text('kartu_sim');
            $table->text('foto_surat');
            $table->text('foto_kendaraan');
            $table->text('foto_sertim');
            $table->text('foto_sopir');
            $table->text('deskripsi');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
