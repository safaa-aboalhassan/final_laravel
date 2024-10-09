<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chef extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone', 
        'salary',
        'category_id',
        
    ];



    function category():BelongsTo{
        return $this->belongsTo(Category::class);
    }
}
