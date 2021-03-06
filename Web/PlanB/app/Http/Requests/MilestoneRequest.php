<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MilestoneRequest extends Request
{
    protected $dontFlash = ['url', 'tekst','type_id','id'];
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
            'publish_from'=>'required|date_format:d/m/Y H:i:s',
            'publish_till'=>'required|date_format:d/m/Y H:i:s',
            'count-real'=>'min:2|numeric',
        ];
    }

    public function messages()
    {
        return [
            'publish_from.required'=>trans('validation.required',['attribute'=>trans('project.publish.vanaf')]),
            'publish_till.required'=>trans('validation.required',['attribute'=>trans('project.publish.tot')]),
            'count-real.min'=>'Zet a.u.b. minimaal 2 blokken in de template!',
        ];
    }
}
