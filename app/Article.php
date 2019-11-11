<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
	use SoftDeletes;
	
	protected $fillable =[
        'titre', 'sous_titre', 'image', 'contenu', 'priorite', 'visible', 'nom_lien', 'adresse_lien'
    ];
	
	//Defauls values
	protected $attributes = [
        'priorite' => 0,
    ];
	
	/**
     * Obtenir l'utilisateur qui a créé l'article
     */
    public function user()
    {
        return $this->belongsTo('App\User','id');
    }
}
