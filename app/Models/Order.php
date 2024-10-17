<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    
    protected $fillable = [
        // 'order_number',
        'food_id',
        'quantity',
        'table_id',
        'total_price',
        
        
        
        
    ];
    protected static function booted()
    {
        static::creating(function ($order) {
            $order->order_number = self::generateOrderNumber();
        });
    }

    public static function generateOrderNumber()
    {
       
        return random_int(10, 199);
    }

    public function table(){
return $this->belongsTo(Table::class);
    }
    

    
        public function food()
        {
            return $this->belongsTo(Food::class);
        }
    
    


}
