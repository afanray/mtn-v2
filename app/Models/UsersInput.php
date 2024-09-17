<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;
  use Illuminate\Database\Eloquent\Relations\BelongsTo;

	class UsersInput extends Model
	{
    protected $table = 'users_input';
    protected $fillable = [
      'user_id',
      'input_data_id',
    ];

    public function user(): BelongsTo
    {
      return $this->belongsTo(User::class, 'user_id');
    }
    public function inputs(): BelongsTo
    {
      return $this->belongsTo(InputDataMapping::class, 'input_data_id');
    }
	}
