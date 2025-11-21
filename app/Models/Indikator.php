<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Indikator extends Model
{
    use HasFactory;
    protected $table = 'indikators';

    protected $fillable = [
        'sasaran_id',
        'name',
        'baseline_21',
        'target_45',
        'satuan',
        'status',
    ];

    public function sasaran(): BelongsTo
    {
        return $this->belongsTo(Sasaran::class, 'sasaran_id');
    }

    public function target_capaian_indikator(): HasMany
    {
        return $this->hasMany(CapaianTargetIndikator::class);
    }
}
