<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Hashing\HashManager;
use Illuminate\Support\Facades\Hash;

class Sasaran extends Model
{
    use HasFactory;

    protected $table = 'sasarans';

    protected $fillable = [
        'bidang_id',
        'name',
        'status',
    ];

    public function bidang(): BelongsTo
    {
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }

    public function indikator(): HasMany
    {
        return $this->hasMany(Indikator::class, 'sasaran_id');
    }
}
