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
        Schema::create('data_dasar_or', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->integer('jml_pelatih_cabor_olimpiade')->nullable();
            $table->integer('jml_pelatih_cabor_paralimpiade')->nullable();
            $table->integer('jml_tenaga_or_sertifikasi_int')->nullable();
            $table->integer('jml_atlet_dunia_olimpiade')->nullable();
            $table->integer('jml_atlet_dunia_paralimpiade')->nullable();
            $table->integer('jml_atlet_muda_dunia_olimpiade')->nullable();
            $table->integer('jml_atlet_muda_dunia_paralimpiade')->nullable();
            $table->integer('peringkat_olympic_games')->nullable();
            $table->integer('peringkat_paralympic_games')->nullable();
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1=submit, 2= rejected, 3=valid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_dasar_or');
    }
};
