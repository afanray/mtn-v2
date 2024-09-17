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
        Schema::create('talenta', function (Blueprint $table) {
            $table->id();
            $table->string('nama_talenta');
            $table->string('foto_talenta')->nullable();
            $table->string('nik')->nullable();
            $table->integer('lembaga_id');
            $table->integer('bidang_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('talenta');
    }
};
