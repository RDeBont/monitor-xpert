<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'centrale_id',
    'naam',
    'soort',
    'bestandspad',
])]
class Document extends Model
{
    protected $table = 'documenten';

    public $timestamps = false;

    public function centrale(): BelongsTo
    {
        return $this->belongsTo(Centrale::class);
    }
}   