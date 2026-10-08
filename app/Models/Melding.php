<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'user_id',
    'tekst',
    'gelezen_op',
])]
class Melding extends Model
{
    protected $table = 'meldingen';

    const CREATED_AT = 'aangemaakt_op';

    const UPDATED_AT = null;

    protected function casts(): array
    {
        return [
            'gelezen_op' => 'datetime',
            'aangemaakt_op' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}