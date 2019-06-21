<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class User_storage extends FormRequest
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
            'name' => 'required|unique:users,name',
            'group' => 'in:groups,id',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'confirm_password' => 'same:password'
        ];
    }

    // public function withValidator($validator)
    // {
    //     $validator->after(function ($validator) {
    //        if ($this->input('password') == 'asdasdasd') {
    //             $validator->errors()->add('field', 'Something is wrong with this field!');
    //         }
    //     });
    // }   
}
