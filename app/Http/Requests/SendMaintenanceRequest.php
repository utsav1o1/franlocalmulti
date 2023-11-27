<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendMaintenanceRequest extends FormRequest
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
            'date' => 'required|date_format:Y-m-d',
            'tenant_name' => 'required',
            'tenant_address' => 'required',
            'tenant_email' => 'required|email',
            'tenant_phone_number' => 'required',
            'message' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => '* required',
            'email' => 'invalid email',
            'date' => 'invalid date'
        ];
    }
}
