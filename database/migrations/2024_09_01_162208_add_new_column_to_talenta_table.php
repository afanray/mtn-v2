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
        Schema::table('talenta', function (Blueprint $table) {
            $table->string('kode_talenta')->nullable();
            $table->string('nisn')->nullable();
            $table->string('nim')->nullable();
            $table->string('tgl_lahir')->nullable();
            $table->string('bidang_talenta')->nullable();
            $table->string('tahapan')->nullable();
            $table->string('produsen_data')->nullable();
            $table->string('walidata')->nullable();
            $table->string('tahun')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('regency_id')->nullable();
            $table->string('province_id')->nullable();
            $table->boolean('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('talenta', function (Blueprint $table) {
            $table->dropColumn('kode_talenta');
            $table->dropColumn('nisn');
            $table->dropColumn('nim');
            $table->dropColumn('tgl_lahir');
            $table->dropColumn('bidang');
            $table->dropColumn('tahapan');
            $table->dropColumn('produsen_data');
            $table->dropColumn('walidata');
            $table->dropColumn('tahun');
            $table->dropColumn('kecamatan');
            $table->dropColumn('kabkota');
            $table->dropColumn('provinsi');
            $table->dropColumn('status');
        });
    }
};
