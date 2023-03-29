<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class Route extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function airportFrom(): BelongsTo
    {
        return $this->belongsTo(Airport::class, 'airport_from', 'id');
    }
    public function airportTo(): BelongsTo
    {
        return $this->belongsTo(Airport::class, 'airport_to', 'id');
    }
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
