<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;
  use Illuminate\Support\Facades\Auth;

  class Pustaka extends Model
	{
    protected $table = 'pustaka';
    protected $fillable = [
      'title',
      'description',
      'link',
      'image',
      'type',
      'created_by',
    ];
    public static function boot(): void
    {
      parent::boot();

      static::creating(static function ($model) {
        $model->created_by = Auth::user()->id;
      });
    }
	}
