<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Talenta extends Model
{
  protected $table = 'talenta';
  protected $fillable = [
    'nama_talenta',
    'foto_talenta',
    'nik',
    'lembaga_id',
    'lembaga_induk_id',
    'lembaga_unit_id',
    'bidang_id',
    'level_talenta_id',
  ];

  public function lembaga(): BelongsTo
  {
    return $this->belongsTo(Lembaga::class, 'lembaga_id');
  }

  public function lembaga_unit(): BelongsTo
  {
    return $this->belongsTo(Lembaga::class, 'lembaga_unit_id');
  }

  public function lembaga_induk(): BelongsTo
  {
    return $this->belongsTo(Lembaga::class, 'lembaga_induk_id');
  }

  public function bidang(): BelongsTo
  {
    return $this->belongsTo(Bidang::class, 'bidang_id');
  }

  public function pendidikan()
  {
    return $this->hasMany(TalentaPendidikan::class);
  }

  public function prestasi()
  {
    return $this->hasMany(TalentaPrestasi::class);
  }

  public function keahlian()
  {
    return $this->hasMany(TalentaKeahlian::class);
  }
}
