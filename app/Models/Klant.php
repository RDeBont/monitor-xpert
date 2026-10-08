<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'user_id',
    'klantnummer',
    'naam',
    'email',
    'telefoonnummer',
])]
class Klant extends Model
{
    protected $table = 'klanten';

    public $timestamps = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function contracten(): HasMany
    {
        return $this->hasMany(Contract::class);
    }

    public function klantmeldingen(): HasMany
    {
        return $this->hasMany(Klantmelding::class);
    }

    public function centrales(): BelongsToMany
    {
        return $this->belongsToMany(Centrale::class, 'contracten', 'klant_id', 'centrale_id');
    }
}