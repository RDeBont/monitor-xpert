<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'storing_id',
    'afzender',
    'onderwerp',
    'tekst',
    'status',
])]
class InkomendeMail extends Model
{
    protected $table = 'inkomende_mails';

    public $timestamps = false;

    public function storing(): BelongsTo
    {
        return $this->belongsTo(Storing::class);
    }
}