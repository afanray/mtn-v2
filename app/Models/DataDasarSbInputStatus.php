<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DataDasarSbInputStatus extends Model
{
  protected $table = 'data_dasar_sb_input_status';
  protected $fillable = [
    'data_dasar_id',
    'input_data_id',
    'url',
    'bottleneck',
    'debottleneck',
    'status',
  ];
  public static function boot(): void
  {
    parent::boot();
    static::creating(static function ($model) {
      if (Auth::user()->role === 'operator') {
        $model->updated_by = Auth::user()->id;
      }
    });
    static::updating(static function ($model) {
      if (Auth::user()->role === 'operator') {
        $model->updated_by = Auth::user()->id;
      }
    });
  }

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class, 'updated_by');
  }

  public function inputs(): BelongsTo
  {
    return $this->belongsTo(InputDataMapping::class, 'input_data_id');
  }

  public function data_dasar(): BelongsTo
  {
    return $this->belongsTo(DataDasarSb::class, 'data_dasar_id');
  }
}
