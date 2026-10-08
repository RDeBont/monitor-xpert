<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'centrale_id',
    'min_temperatuur',
    'max_temperatuur',
    'min_efficientie',
])]
class Grenswaarde extends Model
{
    protected $table = 'grenswaarden';

    public $timestamps = false;

    protected function casts(): array
    {
        return [
            'min_temperatuur' => 'decimal:1',
            'max_temperatuur' => 'decimal:1',
            'min_efficientie' => 'decimal:1',
        ];
    }

    public function centrale(): BelongsTo
    {
        return $this->belongsTo(Centrale::class);
    }
}