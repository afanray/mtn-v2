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
      Schema::table('data_indikator', function (Blueprint $table) {
        $table->integer('jml_sdm_iptek_top_sc')->nullable()->after('jml_paten_lisensi');
        $table->integer('raihan_penghargaan_int')->nullable()->after('jml_paten_lisensi');
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
