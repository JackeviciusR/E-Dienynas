<?php

namespace App\Http\Requests;

use App\Rules\NationalIdentificationNumberRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use function PHPUnit\Framework\isEmpty;


class PersonRequest extends FormRequest
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
//        $this->person->id;

        $rules = [
            'name'=>['required','alpha', 'min:2'], //regex:/^[a-zA-Z]+$/u
            'surname'=>['required','alpha', 'min:3'],
            'national_identification_number'=>[
                'required',
                'numeric',
                'digits:11',
                new NationalIdentificationNumberRule(),
                ]
        ];

        if(isset($this->person->id)) {
            // $rules['national_identification_number'][] ='unique:people,national_identification_number,' . $this->person->id, // veikiantis variantas
            $rules['national_identification_number'][] = Rule::unique('people','national_identification_number')
                                                             ->ignore($this->person->id, 'id');
        }

        // jei unique, butina:
        // 'unique:table_name,column_name,ignored_id', ignored_id - reikia id skaiciaus formatu

        return $rules;

    }

    public function messages()
    {
        return [
            'required'=>'Privalomas :attribute laukas!',
        ];
    }
}
