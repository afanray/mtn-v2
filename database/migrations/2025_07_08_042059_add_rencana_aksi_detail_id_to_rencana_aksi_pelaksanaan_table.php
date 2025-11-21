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
        Schema::table('rencana_aksi_pelaksanaan', function (Blueprint $table) {
            //
            $table->integer('rencana_aksi_detail_id')->nullable();
            $table->string('kategori_masalah')->nullable();
            $table->string('kondisi_ideal')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rencana_aksi_pelaksanaan', function (Blueprint $table) {
            //
            $table->dropColumn('rencana_aksi_detail_id');
            $table->dropColumn('kategori_masalah');
            $table->dropColumn('kondisi_ideal');
        });
    }
};
