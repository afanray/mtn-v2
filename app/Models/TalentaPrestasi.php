<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalentaPrestasi extends Model
{
    use HasFactory;
    protected $table = 'talenta_prestasi';

    public function talenta()
    {
        return $this->belongsTo(Talenta::class);
    }
}
