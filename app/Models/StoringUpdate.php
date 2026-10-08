<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'storing_id',
    'user_id',
    'soort',
    'tekst',
])]
class StoringUpdate extends Model
{
    protected $table = 'storing_updates';

    const CREATED_AT = 'aangemaakt_op';

    const UPDATED_AT = null;

    protected function casts(): array
    {
        return [
            'aangemaakt_op' => 'datetime',
        ];
    }

    public function storing(): BelongsTo
    {
        return $this->belongsTo(Storing::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}