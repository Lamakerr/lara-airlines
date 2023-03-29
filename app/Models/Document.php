<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Document extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    public function documentType(): BelongsTo
    {
        return $this->belongsTo(DocumentType::class);
    }
    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }
    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }
    public function user(): HasOneThrough
    {
        return $this->hasOneThrough(
            User::class,
            Contact::class,
            'document_id',
            'id',
            'id',
            'user_id',
        );
    }
}
