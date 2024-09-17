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
        Schema::create('prizes_riset_inovasi_int', function (Blueprint $table) {
            $table->id();
            $table->string('nama_prize');
            $table->string('tahun');
            $table->integer('lembaga_id');
            $table->integer('highlight_talenta_id');
            $table->integer('ref_prizes_id');
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
        Schema::dropIfExists('prizes_riset_inovasi_int');
    }
};
