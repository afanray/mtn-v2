<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;
  use Illuminate\Database\Eloquent\Relations\BelongsTo;
  use Illuminate\Support\Facades\Auth;

  class HighlightIntervensi extends Model
	{
    protected $table = 'highlight_intervensi';
    protected $fillable = [
      'nama_program',
      'jenis',
      'desc',
      'tahun_mulai',
      'tahun_selesai',
      'link_web',
      'bidang',
      'unit_id',
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

    public function unit(): BelongsTo {
      return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function creator(): BelongsTo {
      return $this->belongsTo(User::class, 'created_by');
    }

    public function updator(): BelongsTo {
      return $this->belongsTo(User::class, 'updated_by');
    }
	}
