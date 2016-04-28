<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProjectStoreRequest extends Request
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
            'projectnaam'=>'required|max:250',
            'projectbeschrijving'=>'required|min:10',
            'publish_from'=>'required|date_format:d/m/Y H:i:s',
            'publish_till'=>'required|date_format:d/m/Y H:i:s',
            'thema_id'=>'required',
            'naam' => 'required|max:250',
            'locatie' => 'required|max:255',
            'beschrijving' => 'required|min:10',
            'afbeelding' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'thema_id.required'=>'Kies een thema!',
            'publish_from.required'=>trans('validation.required',['attribute'=>trans('project.publish.vanaf')]),
            'publish_till.required'=>trans('validation.required',['attribute'=>trans('project.publish.tot')])
        ];
    }
}
