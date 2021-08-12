<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
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
            'day_of_week'=>['required', 'alpha'],
            'lesson_number'=>['numeric', 'max:12'],
            'first_day'=>['required','date', 'date_format:Y-m-d'],
            'last_day'=>['required','date','date_format:Y-m-d','after:first_day_at'],
        ];
    }
}
