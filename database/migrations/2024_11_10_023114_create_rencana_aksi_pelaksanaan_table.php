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
        Schema::create('rencana_aksi_pelaksanaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rencana_aksi_id'); // Foreign key column
            $table->text('tantangan_pelaksanaan')->nullable();
            $table->text('strategi_pelaksanaan')->nullable();
            $table->timestamps();

            // Define the foreign key constraint
            $table->foreign('rencana_aksi_id')->references('id')->on('rencana_aksi')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rencana_aksi_pelaksanaan');
    }
};
