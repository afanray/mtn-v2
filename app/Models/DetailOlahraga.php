<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOlahraga extends Model
{
    use HasFactory;
    protected $table = 'detail_olahraga';


    protected $fillable = [
        'asal_sekolah',
        'jenis_prestasi',
        'nomor_kategori',
        'cabor_ioco',
        'jaringan_kopetensi',
        'wadah_pembinaan',
        'rekomendasi_intervensi',
    ];



    public function talenta()
    {
        return $this->belongsTo(Talenta::class);
    }
}
