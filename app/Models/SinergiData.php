<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SinergiData extends Model
{
    use HasFactory;

 public function lembaga(): BelongsTo
  {
    return $this->belongsTo(Lembaga::class, 'lembaga_id');
  }

 public function population()
  {
    return $this->hasMany(Populations::class);
  }

  public function lembaga_unit(): BelongsTo
  {
    return $this->belongsTo(Lembaga::class, 'lembaga_unit_id');
  }

  public function lembaga_induk(): BelongsTo
  {
    return $this->belongsTo(Lembaga::class, 'lembaga_induk_id');
  }
}
