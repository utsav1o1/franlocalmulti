<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendAppraisalRequest extends FormRequest
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
            'fname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'suburb' => 'required',
            'email' => 'nullable|email',
            'g-recaptcha-response' => 'required|captcha',
            'my_name' => 'honeypot',
            'my_time' => 'required|honeytime:10',
            'contact' => 'required|numeric',
            'postcode' => 'required|required|postal_code:Au',
        ];
    }

    public function messages()
    {
        return [
            'required' => '* required',
            'email' => 'invalid email',
            'g-recaptcha-response.required' => 'Recaptcha field is required',
        ];
    }
}
