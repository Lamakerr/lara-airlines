<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class User extends Model
{
    use HasFactory;

    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
    public function comments(): BelongsToMany
    {
        return $this->belongsToMany(Comment::class, 'comment_users');
    }
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'orders');
    }
    public function coupons(): BelongsToMany
    {
        return $this->belongsToMany(Coupon::class, 'orders');
    }
    public function documents(){
        return $this->belongsToMany(Contact::class, 'contacts');
    }
}
