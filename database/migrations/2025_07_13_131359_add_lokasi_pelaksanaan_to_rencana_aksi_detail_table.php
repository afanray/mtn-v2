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
        Schema::table('rencana_aksi_detail', function (Blueprint $table) {
            //
            $table->string('lokasi_pelaksanaan')->nullable();
            $table->string('status_pelaksanaan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rencana_aksi_detail', function (Blueprint $table) {
            //
            $table->dropColumn('lokasi_pelaksanaan');
            $table->dropColumn('status_pelaksanaan');
        });
    }
};
