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
        Schema::create('data_indikator', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->boolean('is_baseline');
            $table->decimal('rasio_sdm_iptek')->nullable();
            $table->decimal('sdm_iptek_s3')->nullable();
            $table->decimal('jml_publikasi_int_disitasi')->nullable();
            $table->decimal('jml_paten_lisensi')->nullable();
            $table->decimal('raihan_olimpiade_sains_tek')->nullable();
            $table->decimal('lulusan_smk_pt_seni_budaya')->nullable()->comment('percent');
            $table->decimal('lembaga_komunitas_aff')->nullable()->comment('percent');
            $table->decimal('jml_karya_seni_budaya_rek_int')->nullable();
            $table->decimal('jml_talenta_seni_budaya_rek_int')->nullable();
            $table->decimal('jml_festival_pameran_int')->nullable();
            $table->decimal('jml_pelatih_sertifikasi_int')->nullable();
            $table->decimal('jml_tenaga_or_int')->nullable();
            $table->decimal('jml_atlet_elit_nas_dunia')->nullable();
            $table->decimal('jml_atlet_muda_dunia')->nullable();
            $table->integer('peringkat_olympic_games')->nullable();
            $table->integer('peringkat_paralympic_games')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_indikator');
    }
};
