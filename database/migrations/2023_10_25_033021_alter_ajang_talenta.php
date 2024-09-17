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
      Schema::table('ajang_talenta', function (Blueprint $table) {
        $table->dropColumn('bidang');
        $table->integer('bidang_id');
        $table->date('tgl_mulai');
        $table->date('tgl_selesai');
        $table->string('foto')->nullable();
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
