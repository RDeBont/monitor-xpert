<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'naam',
    'regio',
])]
class Locatie extends Model
{
    protected $table = 'locaties';

    public $timestamps = false;

    public function centrales(): HasMany
    {
        return $this->hasMany(Centrale::class);
    }
}