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
        Schema::create('data_dasar', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->integer('jml_penduduk')->nullable();
            $table->integer('jml_dosen')->nullable();
            $table->integer('jml_fungsional_peneliti')->nullable();
            $table->integer('jml_fungsional_perekayasa')->nullable();
            $table->integer('jml_dosen_s3')->nullable();
            $table->integer('jml_fungsional_peniliti_s3')->nullable();
            $table->integer('jml_fungsional_perekayasa_s3')->nullable();
            $table->integer('cited_docs_indonesia')->nullable();
            $table->integer('jml_paten_lisensi')->nullable();
            $table->integer('jml_indexed_scientist')->nullable();
            $table->integer('jml_pdbst_sd')->nullable();
            $table->integer('jml_pdbst_smp')->nullable();
            $table->integer('jml_pdbst_sma')->nullable();
            $table->integer('jml_pdbst_dikti')->nullable();
            $table->integer('jml_pdbst_diksus')->nullable();
            $table->integer('jml_lulus_smk_b_seni')->nullable();
            $table->integer('jml_lulus_smk_b_seni_kerja_seni')->nullable();
            $table->integer('jml_lulus_pt_b_seni')->nullable();
            $table->integer('jml_lulus_pt_b_seni_kerja_seni')->nullable();
            $table->integer('jml_lembaga_sanggar_kom')->nullable();
            $table->integer('jml_lembaga_sanggar_kom_aff')->nullable();
            $table->integer('jml_karya_seni_budaya')->nullable();
            $table->integer('jml_talenta_seni_budaya')->nullable();
            $table->integer('jml_festival_pameran')->nullable();
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
        Schema::dropIfExists('data_dasar');
    }
};
