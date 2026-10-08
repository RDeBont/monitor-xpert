<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'klant_id',
    'centrale_id',
    'storing_id',
    'meldingnummer',
    'type_probleem',
    'omschrijving',
    'status',
    'gemeld_op',
])]
class Klantmelding extends Model
{
    protected $table = 'klantmeldingen';

    public $timestamps = false;

    protected function casts(): array
    {
        return [
            'gemeld_op' => 'datetime',
        ];
    }

    public function klant(): BelongsTo
    {
        return $this->belongsTo(Klant::class);
    }

    public function centrale(): BelongsTo
    {
        return $this->belongsTo(Centrale::class);
    }

    public function storing(): BelongsTo
    {
        return $this->belongsTo(Storing::class);
    }

    public function berichten(): HasMany
    {
        return $this->hasMany(KlantmeldingBericht::class);
    }
}