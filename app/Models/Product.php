<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'image',
        'collection',
        'category',
        'price',
        'stock',
        'top_notes',
        'middle_notes',
        'base_notes',
        'longevity',
        'description',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}