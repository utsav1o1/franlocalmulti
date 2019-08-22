<?php

namespace App\Http\Requests\Admin\Agent;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Request;

class UpdateRequest extends FormRequest
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
     * @param Request $request
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'first_name'=>'required',
            'last_name'=>'required',
            'email_address'=>'required|email|unique:agents,email_address,'.$request->get('id') .',id',
            'mobile_number'=>'required',
            'location_id'=>'required',
            'attachment'=>'image|max:1024'
        ];
    }
}
