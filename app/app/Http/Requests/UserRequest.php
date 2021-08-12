<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the users is authorized to make this request.
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
            'username'=>['required'],
            'email'=>['required','email'],
            'password'=>['min:6','confirmed'],
            'role_id'=>['required','numeric'],
            'person_id'=>['numeric'],
            'school_id'=>['numeric'],
        ];
    }
}
