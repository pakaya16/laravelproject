<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class GroupuserRequest extends Request
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
                    'status'            => 'required',
                    'id'                => 'numeric',
                    'group_name'        => ['required', 'unique:group_user,group_name'],
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'status'            => 'required',
                    'id'                => 'numeric',
                    'group_name'        => ['required', 'unique:group_user,group_name,'.e($this->input('id'))],
                ];
            }
            default:break;
        }
    }
    public function messages()
    {
        if (in_array($this->session()->get('lang'), Config('admin.listTransLang'))) {

        }

    }
}