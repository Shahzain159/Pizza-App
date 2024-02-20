<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crust_options extends Model
{
    use HasFactory;
    protected $table = 'crust_options';

    protected $fillable = ['name', 'price', 'image'];

    public function orderDetails()
    {
        return $this->hasMany(order_details::class);
    }
}
