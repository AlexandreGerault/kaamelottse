<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'categorie' => 'required|numeric|max:10',
            'email' => 'required|email|max:100',
            'contenu' => 'required|string|max:5000',
            'sujet' => 'required|string|max:200',			
        ];
    }
}
