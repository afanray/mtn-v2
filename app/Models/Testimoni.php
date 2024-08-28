<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Builder;
  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Database\Eloquent\Relations\BelongsTo;

  class Testimoni extends Model
	{
    protected $table = 'testimoni';
    protected $fillable = [
      'nama',
      'nama_lembaga',
      'alamat_lembaga',
      'province_id',
      'regency_id',
      'bidang_id',
      'foto',
      'konten',
      'status',
      'no_hp',
      'email',
    ];

    public function scopeValid(Builder $query): void
    {
      $query->where('status', true);
    }

    public function scopeUnValid(Builder $query): void
    {
      $query->where('status', true);
    }

    public function province(): BelongsTo {
      return $this->belongsTo(Province::class, 'province_id');
    }

    public function regency(): BelongsTo {
      return $this->belongsTo(Regencies::class, 'regency_id');
    }

    public function bidang(): BelongsTo {
      return $this->belongsTo(Bidang::class, 'bidang_id');
    }
	}
