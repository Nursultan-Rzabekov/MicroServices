<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateActorRequest extends FormRequest
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
            'First_Name'=>'required|max:10|min:3',
            'Last_Name'=>'required|max:10|min:3',
            'Age'=>'rrequired|max:3|min:1',
        ];
    }
}
