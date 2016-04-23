<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MilestoneRequest extends Request
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
            'naam' => 'required|max:250',
            'locatie' => 'required|max:255',
            'beschrijving' => 'required|min:10',
            'afbeelding' => 'required|max:255',
        ];
    }
}
