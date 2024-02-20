<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $table = 'cart_items';

    protected $fillable = ['user_id', 'pizza_id', 'crust_id', 'cold_drink1_id', 'cold_drink2_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pizza()
    {
        return $this->belongsTo(pizza::class);
    }

    public function crust()
    {
        return $this->belongsTo(crust_options::class);
    }

    public function coldDrink1()
    {
        return $this->belongsTo(cold_drinks::class, 'cold_drink1_id');
    }

    public function coldDrink2()
    {
        return $this->belongsTo(cold_drinks::class, 'cold_drink2_id');
    }

}
