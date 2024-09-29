<?php


	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;
  use Illuminate\Database\Eloquent\Relations\BelongsTo;


	class Province extends Model
	{
    protected $table = 'province';
    protected $fillable = [
      'code',
      'name',
      'latitude',
      'longitude',
    ];

    public function talenta(): BelongsTo  {
        return $this->belongsTo(Talenta::class, 'talenta_id');
    }


	}
