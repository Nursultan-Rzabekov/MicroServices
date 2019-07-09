<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFilmRequest extends FormRequest
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
            'Language_ID'=>'required|max:100',
            'Title'=>'required|max:100',
            'Description'=>'required|max:100',
            'Rating'=>'required|max:7|min:1',
            'Release_Year'=>'required|max:4|min:4',
        ];
    }
}
