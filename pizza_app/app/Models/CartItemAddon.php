<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItemAddon extends Model
{

    use HasFactory;
    protected $table = "cart_item_addons";

    protected $fillable = [
        'user_id',
        'cold_drink_id',
        // Add any additional fillable columns here
    ];

    // Define relationship with ColdDrink model
    public function coldDrink()
    {
        return $this->belongsTo(cold_drinks::class);
    }

// ColdDrink model
public function cartItems()
{
    return $this->belongsToMany(CartItem::class, 'cart_item_addons');
}
}
