<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;

	class TargetIndikator extends Model
	{
    protected $table = 'target_indikator';
    protected $fillable = [
      'field',
      'year',
      'bidang_id',
      'target'
    ];
	}
