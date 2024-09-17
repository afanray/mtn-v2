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
        $table->integer('lembaga_unit_id')->after('lembaga_id');
        $table->integer('lembaga_induk_id')->after('lembaga_id');
      });
      Schema::table('highlight_talenta', function (Blueprint $table) {
        $table->integer('lembaga_unit_id')->after('lembaga_id');
        $table->integer('lembaga_induk_id')->after('lembaga_id');
      });
      Schema::table('talenta', function (Blueprint $table) {
        $table->integer('lembaga_unit_id')->after('lembaga_id');
        $table->integer('lembaga_induk_id')->after('lembaga_id');
      });
      Schema::table('users', function (Blueprint $table) {
        $table->integer('lembaga_unit_id')->after('lembaga_id')->nullable();
        $table->integer('lembaga_induk_id')->after('lembaga_id')->nullable();
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
