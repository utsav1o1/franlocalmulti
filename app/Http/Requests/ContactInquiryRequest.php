<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactInquiryRequest extends FormRequest
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
            'first_name' => 'required|min:3|max:255',
            'last_name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'phone_number' => 'required|numeric',
            'message' => 'required|max:500',
            'g-recaptcha-response' => 'required|captcha',

        ];
    }

    public function messages()
    {
        return [
            'g-recaptcha-response.required' => 'ReCaptcha field is required!!',
        ];
    }
}
