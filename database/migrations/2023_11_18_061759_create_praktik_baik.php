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
        Schema::create('praktik_baik', function (Blueprint $table) {
            $table->id();
            $table->integer('bidang_id');
            $table->string('nama_program');
            $table->integer('lembaga_id');
            $table->integer('lembaga_induk_id');
            $table->integer('lembaga_unit_id');
            $table->string('lokasi_waktu');
            $table->text('latar_belakang');
            $table->text('tujuan');
            $table->text('luaran_manfaat_dampak');
            $table->string('pembelajaran');
            $table->text('kolaborasi');
            $table->string('kontribusi');
            $table->text('keberlanjutan_program');
            $table->string('link');
            $table->string('foto');
            $table->string('nama_pengirim');
            $table->string('email');
            $table->string('no_hp');
            $table->integer('created_by');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('praktik_baik');
    }
};
