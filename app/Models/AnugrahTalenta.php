<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Casts\Attribute;
  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Database\Eloquent\Relations\BelongsTo;
  use Illuminate\Support\Facades\Auth;
  use Illuminate\Support\Str;

  class AnugrahTalenta extends Model
	{
    protected $table = 'anugrah_talenta';
    protected $fillable = [
      'nama_kegiatan',
      'desc_kegiatan',
      'tahun_pelaksanaan',
      'link_web',
      'bidang_id',
      'tingkat_rekognisi',
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

    public function creator(): BelongsTo {
      return $this->belongsTo(User::class, 'created_by');
    }

    public function updator(): BelongsTo {
      return $this->belongsTo(User::class, 'updated_by');
    }

    public function bidang(): BelongsTo {
      return $this->belongsTo(Bidang::class, 'bidang_id');
    }

	}
