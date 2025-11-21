<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RencanaAksiDetail extends Model
{
    use HasFactory;

    protected $table = 'rencana_aksi_detail';

    protected $fillable = [
        'rencana_aksi_id',
        'tahun',
        'bulan',
        'capaian',
        'realisasi_anggaran',
        'lokasi_pelaksanaan',
        'status_pelaksanaan'
    ];

    public function rencana_aksi(): BelongsTo
    {
        return $this->belongsTo(RencanaAksi::class, 'rencana_aksi_id');
    }
}
