<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'centrale_id',
    'technicus_id',
    'type_taak',
    'omschrijving',
    'gepland_op',
    'verwachte_duur_uren',
    'status',
])]
class Onderhoudstaak extends Model
{
    protected $table = 'onderhoudstaken';

    public $timestamps = false;

    protected function casts(): array
    {
        return [
            'gepland_op' => 'datetime',
            'verwachte_duur_uren' => 'decimal:1',
        ];
    }

    public function centrale(): BelongsTo
    {
        return $this->belongsTo(Centrale::class);
    }

    public function technicus(): BelongsTo
    {
        return $this->belongsTo(User::class, 'technicus_id');
    }
}