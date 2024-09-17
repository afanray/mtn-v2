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
      Schema::table('data_indikator', function (Blueprint $table) {
        $table->decimal('rasio_sdm_iptek',15,2)->nullable()->change();
        $table->decimal('sdm_iptek_s3',15,2)->nullable()->change();
        $table->decimal('jml_publikasi_int_disitasi',15,2)->nullable()->change();
        $table->decimal('jml_paten_lisensi',15,2)->nullable()->change();
        $table->decimal('raihan_olimpiade_sains_tek',15,2)->nullable()->change();
        $table->decimal('lulusan_smk_pt_seni_budaya',15,2)->nullable()->change();
        $table->decimal('lembaga_komunitas_aff',15,2)->nullable()->change();
        $table->decimal('jml_karya_seni_budaya_rek_int',15,2)->nullable()->change();
        $table->decimal('jml_talenta_seni_budaya_rek_int',15,2)->nullable()->change();
        $table->decimal('jml_festival_pameran_int',15,2)->nullable()->change();
        $table->decimal('jml_pelatih_sertifikasi_int',15,2)->nullable()->change();
        $table->decimal('jml_tenaga_or_int',15,2)->nullable()->change();
        $table->decimal('jml_atlet_elit_nas_dunia',15,2)->nullable()->change();
        $table->decimal('jml_atlet_muda_dunia',15,2)->nullable()->change();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
