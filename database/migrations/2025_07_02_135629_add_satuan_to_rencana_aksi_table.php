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
        Schema::table('rencana_aksi', function (Blueprint $table) {
            //
            $table->string('satuan')->nullable();
            $table->string('target')->nullable();
            $table->string('realisasi')->nullable();
            $table->string('alokasi_anggaran')->nullable();
            $table->string('lokasi_pelaksanaan_kegiatan')->nullable();
            $table->string('instansi_pelaksana')->nullable();
            $table->string('nama_program')->nullable();
            $table->string('nama_komponen')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rencana_aksi', function (Blueprint $table) {
            //
            $table->dropColumn('satuan');
            $table->dropColumn('target');
            $table->dropColumn('realisasi');
            $table->dropColumn('alokasi_anggaran');
            $table->dropColumn('lokasi_pelaksanaan_kegiatan');
            $table->dropColumn('instansi_pelaksana');
            $table->dropColumn('nama_program');
            $table->dropColumn('nama_komponen');
        });
    }
};
