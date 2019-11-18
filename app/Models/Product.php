<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable =[
        'name', 'description', 'image', 'priority', 'available', 'price', 'points'
    ];
}
