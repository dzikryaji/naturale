<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search. '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->where('category', $category);
        });
    }

    public function scopeDecreaseStock($query, $cart)
    {   
        $product = $cart->product;
        $product->stock -= $cart->quantity;
        $product->update();
    }
}
