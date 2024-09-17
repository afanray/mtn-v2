<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Builder;
  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Database\Eloquent\Relations\BelongsTo;
  use Illuminate\Support\Facades\Auth;

  class PraktikBaik extends Model
	{
    protected $table = 'praktik_baik';
    protected $fillable = [
      'bidang_id',
      'nama_program',
      'lembaga_id',
      'lembaga_induk_id',
      'lembaga_unit_id',
      'lokasi_waktu',
      'latar_belakang',
      'tujuan',
      'luaran_manfaat_dampak',
      'pembelajaran',
      'kolaborasi',
      'kontribusi',
      'keberlanjutan_program',
      'link',
      'foto',
      'nama_pengirim',
      'email',
      'no_hp',
      'created_by',
      'status',
    ];

    public static function boot(): void
    {
      parent::boot();

      static::creating(static function ($model) {
        $model->created_by = Auth::user()->id;
      });
    }

    public function scopeValid(Builder $query): void
    {
      $query->where('status', true);
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
	}
