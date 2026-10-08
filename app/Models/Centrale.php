<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Fillable([
    'locatie_id',
    'naam',
    'adres',
    'status',
])]
class Centrale extends Model
{
    protected $table = 'centrales';

    public $timestamps = false;

    public function locatie(): BelongsTo
    {
        return $this->belongsTo(Locatie::class);
    }

    public function grenswaarde(): HasOne
    {
        return $this->hasOne(Grenswaarde::class);
    }

    public function metingen(): HasMany
    {
        return $this->hasMany(Meting::class);
    }

    public function laatsteMeting(): HasOne
    {
        return $this->hasOne(Meting::class)->latestOfMany('gemeten_op');
    }

    public function storingen(): HasMany
    {
        return $this->hasMany(Storing::class);
    }

    public function contracten(): HasMany
    {
        return $this->hasMany(Contract::class);
    }

    public function klantmeldingen(): HasMany
    {
        return $this->hasMany(Klantmelding::class);
    }

    public function onderhoudstaken(): HasMany
    {
        return $this->hasMany(Onderhoudstaak::class);
    }

    public function documenten(): HasMany
    {
        return $this->hasMany(Document::class);
    }
}