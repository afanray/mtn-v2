<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogRencanaAksi extends Model
{
    use HasFactory;
    // Table name
    protected $table = 'log_rencana_aksi';

    // Mass assignable attributes
    protected $fillable = [
        'rencana_aksi_id',
        'tahun',
        'type',
        'tantangan_pelaksanaan',
        'strategi_pelaksanaan',
        'status_pelaksanaan',
        'created_by',
        'created_at',
        'target',
        'realisasi_anggaran',
    ];

    // Disable timestamps if not using updated_at
    public $timestamps = false;

    // Relationships (if applicable)
    public function rencanaAksi()
    {
        return $this->belongsTo(RencanaAksi::class, 'rencana_aksi_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
