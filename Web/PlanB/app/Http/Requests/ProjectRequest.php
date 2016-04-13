<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProjectRequest extends Request
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
            'naam'=>'required|max:250',
            'publish_from'=>'required|date_format:d/m/Y H:i:s',
            'publish_till'=>'required|date_format:d/m/Y H:i:s',
        ];
    }
}
