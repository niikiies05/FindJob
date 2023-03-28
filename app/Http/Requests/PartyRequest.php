<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartyRequest extends FormRequest
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
            'name'=>'required|unique:modeles|min:3|max:25',
            'party'=>'required'
        ];
    }

    public function messages(){
        return[
            'name.required' => 'please enter the modele name',
            'name.min' => 'the name must be between 3 and 25 letters',
            'party.required' => 'please enter the party date'
        ];
    }
}
