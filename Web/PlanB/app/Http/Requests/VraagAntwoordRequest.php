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
        $rules= [
            'vraag'=>'required|max:255',
        ];
        for ($i=1;$i<=$this->request->get('count');$i++){
            if(!$this->request->get('del-'.$i)) {
                $rules['antwoord-' . $i] = 'required|max:255';
            }
        }
        return $rules;
    }

    public function messages()
    {
        $messages= [
            'vraag.required'=>'Vul de vraag/stelling in die je wilt stellen',
        ];
        for ($i=1;$i<=$this->request->get('count');$i++) {
            if (!$this->request->get('del-' . $i)) {
                $messages['antwoord-' . $i . '.required'] = trans('validation.required', ['attribute' => trans('vraag-antwoord.antwoord') . ' ' . $i]);
            }
        }

        return $messages;
    }
}
