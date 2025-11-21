<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RencanaAksiPelaksanaan extends Model
{
    use HasFactory;

    protected $table = 'rencana_aksi_pelaksanaan';

    protected $fillable = [
        'rencana_aksi_id',
        'tantangan_pelaksanaan',
        'strategi_pelaksanaan',
        'status_pelaksanaan',
        'rencana_aksi_detail_id',
        'kategori_masalah',
        'kondisi_ideal'
    ];

    public function rencanaAksi()
    {
        return $this->belongsTo(RencanaAksi::class);
    }

    public function rencana_aksi(): BelongsTo
    {
        return $this->belongsTo(RencanaAksi::class, 'rencana_aksi_id');
    }

    public function rencana_aksi_detail(): BelongsTo
    {
        return $this->belongsTo(RencanaAksiDetail::class, 'rencana_aksi_detail_id');
    }
}
