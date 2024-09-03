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
        Schema::create('talenta_pendidikan', function (Blueprint $table) {
            $table->id();
            $table->integer('talenta_id');
            $table->string('tingkat');
            $table->string('nama');
            $table->string('tgl_lulus');
            $table->string('foto_ijazah')->nullable();
            $table->string('ijazah_url')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('talenta_pendidikans');
    }
};
