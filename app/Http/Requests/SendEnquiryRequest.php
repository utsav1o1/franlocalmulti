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
            'address' => 'required',
            'email' => 'nullable|email',
            'contact' => 'required',
            'reference_source' => 'required',
            'location' => 'required',
            'finance_ready' => 'required',
            'budget' => 'required',
            'first_home_buyer_investor' => 'required',
            'agree_terms_conditions' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ];
    }

    public function messages()
    {
        return [
            'required' => '* required',
            'email' => 'invalid email',
            'g-recaptcha-response.required' => 'Recaptcha field is required'
        ];
    }
}
