<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['role_id', 'name', 'email', 'telefoonnummer', 'password', 'actief'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'actief' => 'boolean',
        ];
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function heeftRol(string $naam): bool
    {
        return $this->role?->naam === $naam;
    }

    public function klant(): HasOne
    {
        return $this->hasOne(Klant::class);
    }

    public function storingen(): BelongsToMany
    {
        return $this->belongsToMany(Storing::class, 'storing_technici', 'user_id', 'storing_id');
    }

    public function onderhoudstaken(): HasMany
    {
        return $this->hasMany(Onderhoudstaak::class, 'technicus_id');
    }

    public function meldingen(): HasMany
    {
        return $this->hasMany(Melding::class);
    }

    public function rapporten(): HasMany
    {
        return $this->hasMany(Rapport::class);
    }

    public function gedeeldeRapporten(): BelongsToMany
    {
        return $this->belongsToMany(Rapport::class, 'rapport_gedeeld', 'user_id', 'rapport_id');
    }
}