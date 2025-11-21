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
        Schema::create('riwayat_pembinaan', function (Blueprint $table) {
            $table->id();
            $table->integer('talenta_id');
            $table->string('category');
            $table->string('code');
            $table->string('name'); 
            $table->string('competition_network');
            $table->boolean('status')->default(0);
            $table->timestamps();    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pembinaan');
    }
};
