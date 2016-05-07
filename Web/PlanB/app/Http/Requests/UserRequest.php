<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
        $user = $this->route('user');
        $return = [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
        ];
        if ($this->method() == 'POST') {
            $return['password'] = 'required|confirmed|min:6';
            $return['email'] = 'required|email|max:255|unique:users';
        }else{
            $return['password'] = 'sometimes|confirmed|min:6';
            $return['email'] = 'required|email|max:255|unique:users,email,'.$user->id;
        }
        
        return $return;

    }
}
