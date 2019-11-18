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
            'title' => 'required|string|max:150',
            'subtitle' => 'nullable|string|max:100',
            'content' => 'string|max:5000',
            'image' => 'nullable|url|max:255',
            'priority' => 'nullable|numeric',
            'published' => 'nullable',
            'slug' => 'string|nullable|max:100',
            'link' => 'string|nullable|max:256',
        ];
    }
}
