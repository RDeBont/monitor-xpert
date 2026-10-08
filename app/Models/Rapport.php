<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable([
    'user_id',
    'titel',
    'periode_van',
    'periode_tot',
])]
class Rapport extends Model
{
    protected $table = 'rapporten';

    const CREATED_AT = 'aangemaakt_op';

    const UPDATED_AT = null;

    protected function casts(): array
    {
        return [
            'periode_van' => 'date',
            'periode_tot' => 'date',
            'aangemaakt_op' => 'datetime',
        ];
    }

    public function maker(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function gedeeldMet(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'rapport_gedeeld', 'rapport_id', 'user_id');
    }
}