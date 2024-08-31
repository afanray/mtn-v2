<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class RefPrizes extends Model
{
  protected $table = 'ref_prizes';
  protected $fillable = [
    'name',
    'frequency',
    'bidang_id',
    'bidang_fokus_id',
    'average',
    'created_by',
    'updated_by',
    'link_web',
    'tingkat',
    'predefined',
  ];
  public static function boot(): void
  {
    parent::boot();

    static::creating(static function ($model) {
      if (Auth::user()) {
        $model->created_by = Auth::user()->id;
      } else {
        $model->created_by = 1;
      }
    });
    static::updating(static function ($model) {
      if (Auth::user()) {
        $model->updated_by = Auth::user()->id;
      }
    });
  }

  public function creator(): BelongsTo
  {
    return $this->belongsTo(User::class, 'created_by');
  }

  public function updator(): BelongsTo
  {
    return $this->belongsTo(User::class, 'updated_by');
  }

  public function bidang(): BelongsTo
  {
    return $this->belongsTo(Bidang::class, 'bidang_id');
  }

  public function bidang_fokus(): BelongsTo
  {
    return $this->belongsTo(BidangFokus::class, 'bidang_fokus_id');
  }
}
