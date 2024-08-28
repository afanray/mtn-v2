<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Casts\Attribute;
  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Database\Eloquent\Relations\BelongsTo;
  use Illuminate\Support\Facades\Auth;
  use Illuminate\Support\Str;

  class AjangTalenta extends Model
	{
    protected $table = 'ajang_talenta';
    protected $fillable = [
      'nama_ajang',
      'desc',
      'link_web',
      'bidang_id',
      'tingkat_rekognisi',
      'tgl_mulai',
      'tgl_selesai',
      'lembaga_id',
      'lembaga_induk_id',
      'lembaga_unit_id',
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

    public function lembaga_unit(): BelongsTo {
      return $this->belongsTo(Lembaga::class, 'lembaga_unit_id');
    }

    public function lembaga_induk(): BelongsTo {
      return $this->belongsTo(Lembaga::class, 'lembaga_induk_id');
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

	}
