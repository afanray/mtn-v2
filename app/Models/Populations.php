<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Populations extends Model
{
    use HasFactory;

protected $fillable = [
    'sinergi_data_id',
    'tahun',
    'jumlah',
  ];

 public function sinergi()
  {
    return $this->belongsTo(SinergiData::class);
  }
}
