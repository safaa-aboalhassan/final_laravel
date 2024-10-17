<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'category_id',
        'price'
        
    ];

    function category():BelongsTo{
        return $this->belongsTo(Category::class);
    }

    function order():HasMany {
        return $this->hasMany(Order::class);
    }
}
