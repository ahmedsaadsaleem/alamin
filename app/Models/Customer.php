<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Customer extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function branches(): HasMany
    {
        return $this->hasMany(CustomerBranch::class);
    }

    public function latestBranch(): HasOne
    {
        return $this->branches()->one()->latestOfMany();
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    // public function latestProduct(): HasOne
    // {
    //     return $this->products()->one()->latestOfMany();
    // }

    // public function getRouteKeyName(): string
    // {
    //     return 'customer_id';
    // }
}
