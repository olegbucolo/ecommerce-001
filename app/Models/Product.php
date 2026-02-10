<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'price',
        'description',
        'category',
        'image',
        'rating_rate',
        'rating_count',
    ];

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}

/*
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'price',
        'description',
        'quantity',
        'rating_rate',
        'rating_count'
    ];

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
*/
