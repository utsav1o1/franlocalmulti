<?php

namespace App\Http\Requests\Admin\Agent;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->guard('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'=>'required',
            'last_name'=>'required',
            'email_address'=>'required|email|unique:agents,email_address',
            'password'=>'required|min:6',
            'confirm_password'=>'required|same:password',
            'mobile_number'=>'required',
            'location_id'=>'required',
            'attachment'=>'image|max:1024'
        ];
    }
}
