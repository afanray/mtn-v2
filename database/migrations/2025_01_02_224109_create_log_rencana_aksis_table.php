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
        Schema::create('log_rencana_aksi', function (Blueprint $table) {
            $table->id('id'); // Auto-increment primary key
            $table->unsignedBigInteger('rencana_aksi_id');
            $table->year('tahun');
            $table->string('type'); // Adjust type as per your requirement
            $table->integer('target'); // Adjust type as per your requirement
            $table->integer('realisasi_anggaran'); // Adjust type as per your requirement
            $table->text('tantangan_pelaksanaan')->nullable();
            $table->text('strategi_pelaksanaan')->nullable();
            $table->string('status_pelaksanaan')->default('pending'); // Example default
            $table->unsignedBigInteger('created_by'); // User foreign key
            $table->timestamp('created_at')->useCurrent(); // Automatically set timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_rencana_aksis');
    }
};
