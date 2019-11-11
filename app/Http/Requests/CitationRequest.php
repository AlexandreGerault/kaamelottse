<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class citationRequest extends FormRequest
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
            'contenu' => 'string|max:2000',
            'auteur' => 'string|max:100|nullable'
        ];
    }
}
