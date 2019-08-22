<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendVacateNoticeRequest extends FormRequest
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
            'tenant_name' => 'required',
            'tenant_address' => 'required',
            'contact_number' => 'required',
            'email_address' => 'required|email',
            'vacating_date' => 'required|date|date_format:Y-m-d'
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
