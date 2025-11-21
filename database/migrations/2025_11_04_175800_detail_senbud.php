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
        Schema::create('detail_senbud', function (Blueprint $table) {
            $table->id();
            $table->integer('talenta_id');
            $table->string('asal_sekolah');
            $table->string('jenis_prestasi');
            $table->string('jenjang_pendidikan');
            $table->string('lama_praktek_artistik');
            $table->string('rekognisi');
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
        Schema::dropIfExists('detail_senbud');
    }
};
