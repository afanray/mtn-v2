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
        Schema::create('ajang_talenta', function (Blueprint $table) {
          $table->id();
          $table->string('nama_ajang');
          $table->integer('tahun_pelaksanaan');
          $table->text('desc');
          $table->string('link_web')->nullable();
          $table->string('bidang')->nullable();
          $table->string('tingkat_rekognisi')->nullable();
          $table->integer('lembaga_id');
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
        Schema::dropIfExists('ajang_talenta');
    }
};
