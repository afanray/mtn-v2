<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;
  use Illuminate\Database\Eloquent\Relations\BelongsToMany;

	class InputDataMapping extends Model
	{
    protected $table = 'input_data_mapping';
    protected $fillable = [
      'field',
      'label',
      'bidang_id',
    ];
    public function users(): BelongsToMany
    {
      return $this->belongsToMany(User::class, 'users_input', 'input_data_id', 'user_id');
    }
	}
