<?php


	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;
  use Illuminate\Database\Eloquent\Relations\BelongsTo;


	class Regencies extends Model
	{
    protected $table = 'regencies';
    protected $fillable = [
      'code',
      'name',
      'province_code',
      'province_id',
      'latitude',
      'longitude',
    ];

    public function talenta(): BelongsTo  {
        return $this->belongsTo(Talenta::class, 'talenta_id');
    }
	}
