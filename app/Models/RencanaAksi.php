<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RencanaAksi extends Model
{
    use HasFactory;

    protected $table = 'rencana_aksi';

    public function bidang(): BelongsTo
    {
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }

    public function rencana_aksi_details()
    {
        return $this->hasMany(RencanaAksiDetail::class);
    }

    public function rencana_aksi_pelaksanaan()
    {
        return $this->hasMany(RencanaAksiPelaksanaan::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
