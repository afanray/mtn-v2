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
        Schema::create('highlight_talenta', function (Blueprint $table) {
            $table->id();
            $table->string('nama_talenta');
            $table->date('tgl_perolehan');
            $table->string('nama_penghargaan');
            $table->text('desc_penghargaan')->nullable();
            $table->string('foto_penghargaan')->nullable();
            $table->string('link_web')->nullable();
            $table->string('bidang')->nullable();
            $table->string('nik')->nullable();
            $table->string('bidang_fokus')->nullable();
            $table->integer('created_by');
            $table->integer('lembaga_id');
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('highlight_talenta');
    }
};
