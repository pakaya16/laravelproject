<?php

namespace App\Http\Requests\Admin;

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
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                        'group_id'          => ['required', 'numeric'],
                        'first_name'        => 'required',
                        'last_name'         => 'required',
                        'status'            => 'required',
                        'username'          => ['required', 'unique:user,username'],
                        'password'          => 'required'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                        'group_id'          => ['required', 'numeric'],
                        'first_name'        => 'required',
                        'last_name'         => 'required',
                        'status'            => 'required',
                        'username'          => ['required', 'unique:user,username,'.e($this->input('id'))],
                ];
            }
            default:break;
        }
    }
    public function messages()
    {
        if (in_array($this->session()->get('lang'), Config('admin.listTransLang'))) {
            return [
                'first_name.required'   => trans('banner_messages.fName') . ' ' . trans('error.required') ,
            ];
        }

    }
}
