<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutputYearData extends Model
{
    use HasFactory;
    protected $table = 'rencana_aksi_detail';
    protected $fillable = [
        'rencana_aksi_id',
        'tahun',
        'target',
        'capaian',
        'alokasi_anggaran',
        'realisasi_anggaran',
        'tantangan_pelaksanaan',
        'strategi_pelaksanaan',
        'status_pelaksanaan'
    ];

    public function yearData()
    {
        return $this->hasMany(OutputYearData::class);
    }
}
