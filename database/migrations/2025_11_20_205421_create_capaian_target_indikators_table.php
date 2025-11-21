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
        Schema::create('capaian_target_indikators', function (Blueprint $table) {
            $table->id();
            $table->integer('indikator_id');
            $table->integer('year');
            $table->decimal('target', 10, 2);
            $table->decimal('capaian', 10, 2);
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capaian_target_indikators');
    }
};
