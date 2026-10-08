<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'klant_id',
    'centrale_id',
    'contractnummer',
    'type',
    'startdatum',
    'einddatum',
    'hersteltijd_uren',
])]
class Contract extends Model
{
    protected $table = 'contracten';

    public $timestamps = false;

    protected function casts(): array
    {
        return [
            'startdatum' => 'date',
            'einddatum' => 'date',
            'hersteltijd_uren' => 'integer',
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
}