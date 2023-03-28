<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'name'=>'required|unique:clients|min:3|max:25',
            'phone_number'=>'required|min:9|max:9',
            'email'=>'required',
            'day_of_birth'=>'required',
            'moin_of_birth'=>'required',
            'year_of_birth'=>'required',
            'religion'=>'required|min:3|max:25',
            'sex'=>'required'
        ];
    }

    public function messages(){
        return[
            'name.required' => 'please enter the user\'s name',
            'name.min' => 'the name must be between 3 and 25 letters',
            'phone_number.required' => 'please enter the user\'s phone number',
            'phone_number.min' => 'please enter the user\'s phone number must be 9 numbers',
            'phone_number.max' => 'please enter the user\'s phone number must be 9 numbers',
            'email.required'=>'enter the user\'s email',
            'day_of_birth.required'=>'enter the user\'s day of birth',
            'moin_of_birth.required'=>'enter the user\'s moin of birth',
            'year_of_birth.required'=>'enter the user\'s year of birth',
            'religion.required'=>'enter the user\'s religion',
            'sex.required'=>'enter the user\'s sex'
        ];
    }
}
