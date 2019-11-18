<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduitRequest extends FormRequest
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
            'nom' => 'required|string|max:150',
            'description' => 'string|max:2000',
            'image' => 'nullable|url|max:255',
            'priorite' => 'numeric',
            'disponible' => 'nullable',
            'prix' => 'numeric',
            'points' => 'numeric',
        ];
    }
}
