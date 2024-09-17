<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;
  use Illuminate\Database\Eloquent\Relations\BelongsTo;
  use Illuminate\Support\Facades\Auth;

  class PrizesRisetInovasiInt extends Model
	{
    protected $table = 'prizes_riset_inovasi_int';
    protected $fillable = [
      'nama_prize',
      'tahun',
      'lembaga_id',
      'highlight_talenta_id',
      'ref_prizes_id',
      'created_by',
      'updated_by',
    ];

    public static function boot(): void
    {
      parent::boot();

      static::creating(static function ($model) {
        $model->created_by = Auth::user()->id;
      });
      static::updating(static function ($model) {
        $model->updated_by = Auth::user()->id;
      });
    }

    public function lembaga(): BelongsTo {
      return $this->belongsTo(Lembaga::class, 'lembaga_id');
    }

    public function highlight_talenta(): BelongsTo {
      return $this->belongsTo(HighLightTalenta::class, 'highlight_talenta_id');
    }

    public function ref_prizes(): BelongsTo {
      return $this->belongsTo(RefPrizes::class, 'ref_prizes_id');
    }

    public function creator(): BelongsTo {
      return $this->belongsTo(User::class, 'created_by');
    }

    public function updator(): BelongsTo {
      return $this->belongsTo(User::class, 'updated_by');
    }
	}
