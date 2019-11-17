<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
	use SoftDeletes;
	
	protected $fillable =[
        'title', 'subtitle', 'image', 'content', 'priority', 'visible', 'slug', 'link'
    ];
	
	//Defauls values
	protected $attributes = [
        'priority' => 0,
    ];
	
	/**
     * Obtenir l'utilisateur qui a créé l'article
     */
    public function user()
    {
        return $this->belongsTo(App\User::class,'id');
    }
}
