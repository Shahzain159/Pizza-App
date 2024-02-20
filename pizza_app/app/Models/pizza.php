<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pizza extends Model
{
    use HasFactory;

    protected $table = 'pizzas';

    protected $fillable = ['name', 'description', 'price', 'image'];

    public function orderDetails()
    {
        return $this->hasMany(order_details::class);
    }
}
