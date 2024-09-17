<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalentaPendidikan extends Model
{
    use HasFactory;

    protected $table = 'talenta_pendidikan';

    public function talenta()
    {
        return $this->belongsTo(Talenta::class);
    }
}
