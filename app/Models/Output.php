<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Output extends Model
{
    use HasFactory;
    protected $table = 'rencana_aksi';
    protected $fillable = [
        'kode_ro',
        'rincian_output',
        'kementerian_lembaga',
        'strategi_terobosan',
        'arah_kebijakan',
        'fokus_pelaksanaan',
        'bidang',
        'operator'
    ];

    public function yearData()
    {
        // Define the correct foreign key
        return $this->hasMany(OutputYearData::class, 'rencana_aksi_id'); // Correct foreign key here
    }
}
