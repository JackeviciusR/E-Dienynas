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
            'title'=>['required', 'max:50'],
            'text'=>['required', 'min:1', 'max:1000'],
            'file'=>[],
            'status'=>['alpha', 'max:10'],
            'sender_id'=>['required', 'numeric'],
            'show_for_sender'=>['boolean'],
        ];
    }
}
