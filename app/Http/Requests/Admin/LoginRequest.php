<?php
namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class LoginRequest extends Request
{
    /**
    * DateCreate 2016-01-21
    */

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
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            case 'POST':
            {
                return [
                        'username'          => 'required',
                        'password'          => 'required',
                ];  
            }
            case 'PUT':
            case 'PATCH':
            default:break;
        }
    }

    /**
    * Change Language from user choose.
    *
    * @return array
    */
    public function messages()
    {
        if (in_array($this->session()->get('lang'), Config('admin.listTransLang'))) 
        {
            return [
                'username.required'   => trans('banner_messages.username') . ' ' . trans('error.required') ,
                'password.required'   => trans('banner_messages.password') . ' ' . trans('error.required') ,
            ];
        }
    }
}