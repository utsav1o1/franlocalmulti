<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendPropertyEstimationRequest extends FormRequest
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
            'email' => 'required|email',
            'street_address' => 'required',
            'suburb_postcode' => 'required',
            'bedrooms' => 'required',
            'bathrooms' => 'required',
            'garages' => 'required',
            'g-recaptcha-response' => 'required|captcha',
            'my_name' => 'honeypot',
            'my_time' => 'required|honeytime:10',
            'phone_number' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'required' => '* required',
            'email' => 'invalid email',
        ];
    }
}
