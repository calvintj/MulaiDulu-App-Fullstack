<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    protected $fillable = ['name', 'expertise', 'bio', 'rating', 'image', 'rate_price'];


    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
}
