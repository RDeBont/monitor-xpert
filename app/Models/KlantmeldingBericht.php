<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'klantmelding_id',
    'user_id',
    'tekst',
])]
class KlantmeldingBericht extends Model
{
    protected $table = 'klantmelding_berichten';

    const CREATED_AT = 'aangemaakt_op';

    const UPDATED_AT = null;

    protected function casts(): array
    {
        return [
            'aangemaakt_op' => 'datetime',
        ];
    }

    public function klantmelding(): BelongsTo
    {
        return $this->belongsTo(Klantmelding::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}