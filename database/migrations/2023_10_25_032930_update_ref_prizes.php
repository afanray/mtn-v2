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
      Schema::table('ref_prizes', function (Blueprint $table) {
        $table->dropColumn('bidang');
        $table->integer('bidang_id');
        $table->integer('bidang_fokus_id')->nullable();
        $table->string('link_web')->nullable();
        $table->integer('tingkat')->comment('1=inter,2=nasional');
        $table->boolean('predefined')->default(true);
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
