<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSenbud extends Model
{
    use HasFactory;
    protected $table = 'detail_senbud';

    protected $fillable = [
        'asal_sekolah',
        'jenis_prestasi',
        'jenjang_pendidikan',
        'lama_praktek_artistik',
        'rekognisi',
        'rekomendasi_intervensi',
    ];


    public function talenta()
    {
        return $this->belongsTo(Talenta::class);
    }
}
