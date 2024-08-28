<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Casts\Attribute;
  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Database\Eloquent\Relations\BelongsTo;
  use Illuminate\Support\Facades\Auth;
  use Illuminate\Support\Str;

  class HighLightTalenta extends Model
	{
    protected $table = 'highlight_talenta';
    protected $fillable = [
      'tahun',
      'desc_penghargaan',
      'foto_penghargaan',
      'link_web',
      'bidang_id',
      'bidang_fokus_id',
      'ref_prizes_id',
      'talenta_id',
      'tahun',
      'created_by',
      'lembaga_id',
      'lembaga_induk_id',
      'lembaga_unit_id',
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

    public function lembaga_unit(): BelongsTo {
      return $this->belongsTo(Lembaga::class, 'lembaga_unit_id');
    }

    public function lembaga_induk_unit(): BelongsTo {
      return $this->belongsTo(Lembaga::class, 'lembaga_induk_id');
    }

    public function talenta(): BelongsTo {
      return $this->belongsTo(Talenta::class, 'talenta_id');
    }

    public function bidang(): BelongsTo {
      return $this->belongsTo(Bidang::class, 'bidang_id');
    }

    public function creator(): BelongsTo {
      return $this->belongsTo(User::class, 'created_by');
    }

    public function updator(): BelongsTo {
      return $this->belongsTo(User::class, 'updated_by');
    }

    public function prizes(): BelongsTo {
      return $this->belongsTo(RefPrizes::class, 'ref_prizes_id');
    }

	}
