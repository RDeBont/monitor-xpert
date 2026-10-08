<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'centrale_id',
    'gemeld_door',
    'storingnummer',
    'melder_email',
    'bron',
    'type',
    'plek_in_fabriek',
    'grootte',
    'urgentie',
    'status',
    'omschrijving',
    'gemeld_op',
    'opgelost_op',
])]
class Storing extends Model
{
    protected $table = 'storingen';

    public $timestamps = false;

    protected function casts(): array
    {
        return [
            'gemeld_op' => 'datetime',
            'opgelost_op' => 'datetime',
        ];
    }

    public function centrale(): BelongsTo
    {
        return $this->belongsTo(Centrale::class);
    }

    public function melder(): BelongsTo
    {
        return $this->belongsTo(User::class, 'gemeld_door');
    }

    public function technici(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'storing_technici', 'storing_id', 'user_id');
    }

    public function updates(): HasMany
    {
        return $this->hasMany(StoringUpdate::class);
    }

    public function klantmeldingen(): HasMany
    {
        return $this->hasMany(Klantmelding::class);
    }

    public function inkomendeMails(): HasMany
    {
        return $this->hasMany(InkomendeMail::class);
    }
}