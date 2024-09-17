<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use App\Models\Unit;

class Lembaga extends Model
{
  protected $table = 'lembaga';
  protected $fillable = [
    'name',
    'address',
    'province_id',
    'regency_id',
    'unit_id',
    'level',
    'parent_id',
    'created_by',
  ];

  public static function boot(): void
  {
    parent::boot();

    static::creating(static function ($model) {
      $model->created_by = Auth::user()->id;
    });
  }

  public function scopeInduk(Builder $query): void
  {
    $query->where('level', 1);
  }

  public function scopeUnit(Builder $query): void
  {
    $query->where('level', 2);
  }

  public function scopeDirektorat(Builder $query): void
  {
    $query->where('level', 3);
  }

  public function parent(): BelongsTo {
    return $this->belongsTo(self::class, 'parent_id');
  }

  public function province(): BelongsTo {
    return $this->belongsTo(Province::class, 'province_id');
  }

  public function regency(): BelongsTo {
    return $this->belongsTo(Regencies::class, 'regency_id');
  }
}
