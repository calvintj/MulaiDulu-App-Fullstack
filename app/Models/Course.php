<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $fillable = ['name', 'description', 'price', 'image'];

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
}
