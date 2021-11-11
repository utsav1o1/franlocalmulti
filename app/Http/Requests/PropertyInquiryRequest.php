<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyInquiryRequest extends FormRequest
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
            'full_name' => 'required',
            'email_address' => 'required|email',
            'message' => 'required',
            'g-recaptcha-response' => 'required|captcha',
            'my_name' => 'honeypot',
            'my_time' => 'required|honeytime:10',

        ];
    }

    public function messages()
    {
        return [
            'g-recaptcha-response.required' => 'ReCaptcha field is required!!',
        ];
    }
}
