<?php

	namespace App\Models;
	use Illuminate\Database\Eloquent\Model;
 	use Illuminate\Database\Eloquent\Relations\BelongsTo;

	class Bidang extends Model
		{
		protected $table = 'bidang';
		protected $fillable = [
		'name'
		];

		public function talenta(): BelongsTo  {
       	 	return $this->belongsTo(Talenta::class, 'talenta_id');
      }

	public function prestasi()
		{
			return $this->belongsTo(TalentaPrestasi::class);
		}
	}
