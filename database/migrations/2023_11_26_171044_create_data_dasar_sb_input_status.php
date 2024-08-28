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
        Schema::create('data_dasar_sb_input_status', function (Blueprint $table) {
            $table->id();
            $table->integer('data_dasar_id');
            $table->integer('input_data_id');
            $table->integer('updated_by')->nullable();
            $table->tinyInteger('status')->nullable()->default(null)->comment('1=valid, 2= rejected');
            $table->string('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_dasar_sb_input_status');
    }
};
