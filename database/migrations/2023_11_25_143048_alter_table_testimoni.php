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
      Schema::table('testimoni', function (Blueprint $table) {
        $table->dropColumn('provinsi');
        $table->dropColumn('kabupaten_kota');
        $table->integer('regency_id')->after('alamat_lembaga');
        $table->integer('province_id')->after('alamat_lembaga');
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
