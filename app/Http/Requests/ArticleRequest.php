<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titre' => 'required|string|max:150',
            'sous_titre' => 'nullable|string|max:100',
            'contenu' => 'string|max:5000',
            'image' => 'nullable|url|max:255',
            'priorite' => 'nullable|numeric',
            'visible' => 'nullable',
            'nom_lien' => 'string|nullable|max:100',
            'adresse_lien' => 'string|nullable|max:256',
        ];
    }
}
