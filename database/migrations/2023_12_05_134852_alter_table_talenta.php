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
      Schema::create('level_talenta', function (Blueprint $table) {
        $table->id();
        $table->integer('bidang_id');
        $table->string('name');
        $table->timestamps();
      });
      Schema::table('talenta', function (Blueprint $table) {
        $table->integer('level_talenta_id')->after('bidang_id')->nullable();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::dropIfExists('level_talenta');
      Schema::table('talenta', function (Blueprint $table) {
        $table->dropColumn('level_talenta_id');
      });
    }
};
