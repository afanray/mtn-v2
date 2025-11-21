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
        //
        Schema::create('detail_olahraga', function (Blueprint $table) {
            $table->id();
            $table->integer('talenta_id');
            $table->string('asal_sekolah');
            $table->string('jenis_prestasi');
            $table->string('nomor_kategori');
            $table->string('cabor_ioco');
            $table->string('jaringan_kopetensi');
            $table->string('wadah_pembinaan');
            $table->text('rekomendasi_intervensi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('detail_olahraga');
    }
};
