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
        $table->decimal('presentase_lulusan_smk_pt_seni_budaya',15,2)->after('jml_sdm_iptek_top_sc')->nullable();
        $table->decimal('presentase_lembaga_sanggar_kom_aff', 15,2)->after('jml_sdm_iptek_top_sc')->nullable();
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
