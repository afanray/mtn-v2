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
        Schema::create('data_dasar_sb', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->integer('jml_lulus_smk_b_seni')->nullable();
            $table->integer('jml_lulus_smk_b_seni_kerja_seni')->nullable();
            $table->integer('jml_lulus_pt_b_seni')->nullable();
            $table->integer('jml_lulus_pt_b_seni_kerja_seni')->nullable();
            $table->integer('jml_lembaga_sanggar_kom')->nullable();
            $table->integer('jml_lembaga_sanggar_kom_aff')->nullable();
            $table->integer('jml_karya_seni_budaya')->nullable();
            $table->integer('jml_talenta_seni_budaya')->nullable();
            $table->integer('jml_festival_pameran')->nullable();
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
        Schema::dropIfExists('data_dasar_sb');
    }
};
