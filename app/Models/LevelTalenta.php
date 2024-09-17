<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;
  use Illuminate\Database\Eloquent\Relations\BelongsTo;

  class LevelTalenta extends Model
	{
    protected $table = 'level_talenta';
    protected $fillable = [
      'bidang_id',
      'name',
    ];
    public function bidang(): BelongsTo {
      return $this->belongsTo(Bidang::class, 'bidang_id');
    }
	}
