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
        Schema::create('talenta_prestasi', function (Blueprint $table) {
            $table->id();
            $table->integer('talenta_id');
            $table->string('nama_prestasi');
            $table->string('deskripsi');
            $table->string('bidang');
            $table->string('tanggal_perolehan');
            $table->string('penyelenggara');
            $table->string('tingkat');
            $table->string('medali');
            $table->string('skor');
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('talenta_prestasis');
    }
};
