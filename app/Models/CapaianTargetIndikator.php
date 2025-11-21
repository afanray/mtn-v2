<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CapaianTargetIndikator extends Model
{
    use HasFactory;

    protected $table = 'capaian_target_indikators';

    protected $fillable = [
        'indikator_id',
        'target',
        'capaian',
        'status',
    ];


    public function indikator(): BelongsTo
    {
        return $this->belongsTo(Indikator::class, 'indikator_id');
    }
}
