<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'order_number',
        'food_id',
        'quantity',
        'table_id',
        'price',
        
        
        
    ];

    public function tables(){
return $this->belongsToMany(Table::class);
    }
}
