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
      Schema::create('highlight_intervensi', function (Blueprint $table) {
        $table->id();
        $table->string('nama_program');
        $table->string('jenis')->nullable();
        $table->text('desc')->nullable();
        $table->integer('tahun_mulai');
        $table->integer('tahun_selesai');
        $table->string('link_web')->nullable();
        $table->string('bidang')->nullable();
        $table->integer('unit_id');
        $table->integer('created_by');
        $table->integer('updated_by')->nullable();
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('highlight_intervensi');
    }
};
