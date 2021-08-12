<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GradeRequest extends FormRequest
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
            'grade'=>['required', 'numeric'],
            'is_edited'=>['required','boolean'],
            'status'=>['alpha', 'min:2'],
            'grade_type_id'=>['required', 'numeric'],
            'student_id'=>['required', 'numeric'],
            'student_group_id'=>['required', 'numeric'],
            'teacher_id'=>['required', 'numeric'],
            'schedule_id'=>['required', 'numeric'],
        ];
    }
}
