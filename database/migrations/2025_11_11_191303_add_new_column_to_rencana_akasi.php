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
        Schema::table('rencana_aksi', function (Blueprint $table) {
            //
            $table->string('alur_pengembangan')->nullable();
            $table->string('instansi_pengampu')->nullable();
            $table->string('sumber_dana')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rencana_aksi', function (Blueprint $table) {
            //
            $table->dropColumn('alur_pengembangan');
            $table->dropColumn('instansi_pengampu');
            $table->dropColumn('sumber_dana');
        });
    }
};
