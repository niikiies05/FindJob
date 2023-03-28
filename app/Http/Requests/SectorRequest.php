<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectorRequest extends FormRequest
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
            'name'=>'required|unique:sectors|min:3|max:25'
        ];
    }

    public function messages(){
        return[
            'name.required' => 'please enter the category name',
            'name.min' => 'the name must be between 3 and 25 letters'
        ];
    }
}
