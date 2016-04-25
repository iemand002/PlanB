<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class VraagAntwoordRequest extends Request
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
            'vraag'=>'required|max:255',
            'antwoord-1'=>'required|max:255',
            'antwoord-2'=>'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'vraag.required'=>'Vul de vraag/stelling in die je wilt stellen',
            'antwoord-1.required'=>trans('validation.required',['attribute'=>trans('vraag-antwoord.antwoord').' 1']),
            'antwoord-2.required'=>trans('validation.required',['attribute'=>trans('vraag-antwoord.antwoord').' 2']),
        ];
    }
}
