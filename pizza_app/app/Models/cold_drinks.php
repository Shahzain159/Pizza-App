<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cold_drinks extends Model
{
    use HasFactory;

    protected $table = 'cold_drinks';

    protected $fillable = ['name', 'size', 'price' , 'image'];

    public function orderDetails()
    {
        return $this->belongsToMany(order_details::class)->withPivot('quantity')->withTimestamps();
    }
}
