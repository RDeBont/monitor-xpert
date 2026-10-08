<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'centrale_id',
    'gemeten_op',
    'zon_kwh',
    'wind_kwh',
    'biomassa_kwh',
    'temperatuur',
    'efficientie',
])]
class Meting extends Model
{
    protected $table = 'metingen';

    public $timestamps = false;

    protected function casts(): array
    {
        return [
            'gemeten_op' => 'datetime',
            'zon_kwh' => 'decimal:1',
            'wind_kwh' => 'decimal:1',
            'biomassa_kwh' => 'decimal:1',
            'temperatuur' => 'decimal:1',
            'efficientie' => 'decimal:1',
        ];
    }

    public function centrale(): BelongsTo
    {
        return $this->belongsTo(Centrale::class);
    }
}