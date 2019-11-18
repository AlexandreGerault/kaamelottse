<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produit extends Model
{
	use SoftDeletes;
	
	protected $fillable =[
        'nom', 'description', 'image', 'priorite', 'disponible', 'prix', 'points'
    ];
}
