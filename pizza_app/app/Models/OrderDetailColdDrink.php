<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetailColdDrink extends Model
{
    use HasFactory;

    protected $table = 'order_detail_cold_drink';

    protected $fillable = ['order_detail_id', 'cold_drink_id', 'quantity'];
    public function coldDrink()
    {
        return $this->belongsTo(cold_drinks::class);
    }

    public function orderDetail()
    {
        return $this->belongsTo(order_details::class);
    }

    public $timestamps = false;
}
