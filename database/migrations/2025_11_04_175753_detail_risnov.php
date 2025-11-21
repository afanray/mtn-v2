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
        Schema::create('detail_risnov', function (Blueprint $table) {
            $table->id();
            $table->integer('talenta_id');
            $table->string('asal_sekolah');
            $table->string('jenis_prestasi');
            $table->string('asal_perguruan_tinggi');
            $table->string('publikasi_artikel_ilmiah_media');
            $table->string('publikasi_peer_reviewed_jurnal');
            $table->string('afiliasi');
            $table->string('url_scopus');
            $table->string('url_google_scholar');
            $table->string('menjadi_anggota_riset');
            $table->float('hibah_penelitian_nasional');
            $table->float('hibah_penelitian_internasional');
            $table->float('jumlah_publikasi_peer_reviewed_jurnal_lead_author');
            $table->string('bidang_kepakaran');
            $table->string('pengalaman_pimpinan_kelompok_riset_rnd_lab');
            $table->string('post_doctoral');
            $table->float('skor_h_index');
            $table->float('jumlah_paten');
            $table->string('nilai_perilaku_ilmiah_konsistensi_outcome');
            $table->text('rekomendasi_intervensi');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_risnov');
    }
};
