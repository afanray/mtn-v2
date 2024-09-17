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
        Schema::create('data_dasar_activity_log', function (Blueprint $table) {
            $table->id();
            $table->integer('input_data_id');
            $table->integer('user_id');
            $table->integer('value')->nullable();
            $table->tinyInteger('status')->nullable()->default(null)->comment('1=valid, 2= rejected');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_dasar_activity_log');
    }
};
