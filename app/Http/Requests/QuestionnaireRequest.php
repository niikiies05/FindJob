<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionnaireRequest extends FormRequest
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
            'name'=>'required|unique:questionnaires|min:3|max:25',
            'description'=>'required',
            #'user_id'=>'required'
        ];
    }

    public function messages(){
        return[
            'name.required' => 'please enter the questionnaires name',
            'name.min' => 'the name must be between 3 and 25 letters',
            'description.required'=>'please enter the dscription of the questionnaire',
            
        ];

    }
}
