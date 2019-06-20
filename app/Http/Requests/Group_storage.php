<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Groups_storage extends FormRequest
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
            'name' => 'required|unique:groups|max:100',
            'rights' => 'required|numeric|between:1,10',
        ];
    }
}
