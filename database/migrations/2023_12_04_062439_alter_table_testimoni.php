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
        $table->integer('bidang_id')->after('alamat_lembaga')->nullable();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::table('testimoni', function (Blueprint $table) {
        $table->dropColumn('bidang_id');
      });
    }
};
