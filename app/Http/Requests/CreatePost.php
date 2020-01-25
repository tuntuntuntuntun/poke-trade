<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePost extends FormRequest
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
            'want' => 'required|max:6',
            'give' => 'required|max:6',
        ];
    }

    public function attributes()
    {
        return [
            'want' => '欲しいポケモン',
            'give' => '譲るポケモン',
        ];
    }
}
