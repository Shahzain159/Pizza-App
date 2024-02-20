<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_details extends Model
{
    use HasFactory;

    protected $table = 'order_details';

    protected $fillable = [
        'order_id', 'pizza_id', 'crust_option_id', 'quantity',
    ];

    public function order()
    {
        return $this->belongsTo(orders::class);
    }

    public function pizza()
    {
        return $this->belongsTo(Pizza::class);
    }

    public function crustOption()
    {
        return $this->belongsTo(crust_options::class);
    }

    public function coldDrinks()
    {
        return $this->belongsToMany(cold_drinks::class)->withPivot('quantity')->withTimestamps();
    }
}
