<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendEnquiryRequest extends FormRequest
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
            'name' => 'required',
            // 'address' => 'required',
            'email' => 'required|email',
            'postcode' => 'required|numeric',
            'purpose' => 'required',
            // 'reference_source' => 'required',
            // 'location' => 'required',
            // 'finance_ready' => 'required',
            // 'budget' => 'required',
            // 'first_home_buyer_investor' => 'required',
            'agree_terms_conditions' => 'required',
            'g-recaptcha-response' => 'required|captcha',
            'my_name' => 'honeypot',
            'my_time' => 'required|honeytime:10',
            'contact' => 'required|numeric',

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
