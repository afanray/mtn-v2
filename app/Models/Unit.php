<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Bidang;

class Unit extends Model
{
  protected $table = 'unit';
  protected $fillable = [
    'name',
    'address',
    'province_id',
    'district_id',
    'bidang_id',
    'created_by',
  ];

  public static function boot(): void
  {
    parent::boot();

    static::creating(static function ($model) {
      $model->created_by = Auth::user()->id;
    });
  }
  public function bidang(): BelongsTo
  {
    return $this->belongsTo(Bidang::class,'bidang_id');
  }
}
