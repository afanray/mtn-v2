<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailRisnov extends Model
{
    use HasFactory;
    protected $table = 'detail_risnov';

    protected $fillable = [
        'asal_sekolah',
        'jenis_prestasi',
        'asal_perguruan_tinggi',
        'publikasi_artikel_ilmiah_medai',
        'publikasi_peer_reviewed_jurnal',
        'afiliasi',
        'url_scopus',
        'url_google_scholar',
        'menjadi_anggota_riset',
        'hibah_penelitian_nasional',
        'hibah_penelitian_internasional',
        'jumlah_publikasi_peer_reviewed_jurnal_lead_author',
        'bidang_kepakaran',
        'pengalaman_pimpinan_kelompok_riset_rnd_lab',
        'post_doctoral',
        'skor_h_index',
        'jumlah_paten',
        'nilai_perilaku_ilmiah_konsistensi_outcome',
        'rekomendasi_intervensi',
    ];
    public function talenta()
    {
        return $this->belongsTo(Talenta::class);
    }
}
