<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationFormSubmitRequest extends FormRequest
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
            'property_street_address' => 'required|max:200',
            'property_suburb' => 'required|max:200',
            'image' => 'required'
        ];
    }

    public function messages()
{
return [
      'image.required' => 'Please  sign in the box and  Click Ok.',
      ];
}
}
