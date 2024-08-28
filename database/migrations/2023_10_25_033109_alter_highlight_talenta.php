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
      Schema::table('highlight_talenta', function (Blueprint $table) {
        $table->dropColumn('nama_talenta');
        $table->dropColumn('tgl_perolehan');
        $table->dropColumn('nama_penghargaan');
        $table->dropColumn('nik');
        $table->dropColumn('bidang');
        $table->dropColumn('bidang_fokus');
        $table->integer('bidang_id');
        $table->integer('bidang_fokus_id')->nullable();
        $table->integer('ref_prizes_id');
        $table->integer('talenta_id');
        $table->string('tahun');
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
