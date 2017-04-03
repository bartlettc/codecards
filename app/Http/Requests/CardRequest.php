<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest
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
            'meta.title' => 'required|max:100',
            'meta.description' => 'required',
            'meta.creator' => 'required',
        ];
    }

    public function messages() {

        return [
            'meta.title.required' => 'Title is required',
            'meta.description.required' => 'Description is required',
            'meta.creator.required' => 'User is required',
        ];
    }
}
