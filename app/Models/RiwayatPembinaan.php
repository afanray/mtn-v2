<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPembinaan extends Model
{
    use HasFactory;

    protected $table = 'riwayat_pembinaan';

    public function talenta()
    {
        return $this->belongsTo(Talenta::class);
    }
}
