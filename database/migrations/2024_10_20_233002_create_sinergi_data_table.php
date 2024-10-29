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
        Schema::create('sinergi_data', function (Blueprint $table) {
            $table->id();
            $table->integer('lembaga_induk_id');
            $table->integer('lembaga_unit_id');
            $table->integer('lembaga_id');
            $table->string('produsen_data');
            $table->string('jenis_data');
            $table->string('base_url');
            $table->string('key');
            $table->string('method');
            $table->string('parameter')->nullable();
            $table->dateTime('last_sinkron')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sinergi_data');
    }
};
