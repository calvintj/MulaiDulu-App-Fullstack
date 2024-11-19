<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['order_id', 'course_id','expert_id', 'quantity', 'price'];


    public static function boot()
    {
        parent::boot();

        static::saving(function ($orderItem) {
            if ((!isset($orderItem->course_id) && !isset($orderItem->expert_id)) || 
                (isset($orderItem->course_id) && isset($orderItem->expert_id))) {
                throw new \Exception('An order item must be linked to either a course or an expert, but not both.');
            }
        });
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function expert(){
        return $this->belongsTo(Expert::class);
    }

}
