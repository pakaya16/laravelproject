<?php
namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class LocationRequest extends Request
{
    /**
    * DateCreate 2016-01-21
    * Create By golf
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
                        'location_name'         => 'required',
                        'limit'                 => ['required','integer'],
                        'status'                => ['required','integer'],
                ];  
            }
            case 'PUT':
            case 'PATCH':
            {
                return [];
            }
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
                'location_name.required'    => trans('banner_messages.locationName') . ' ' . trans('error.required'),
                'limit.required'            => trans('banner_messages.limit') . ' ' . trans('error.required'),
                'limit.integer'             => trans('banner_messages.limit') . ' ' . trans('error.integer'),
                'status.required'           => trans('banner_messages.status') . ' ' . trans('error.required'),
                'status.integer'            => trans('banner_messages.status') . ' ' . trans('error.integer'),
            ];
        }

        return [] ;
    }
}