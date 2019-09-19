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
            'property_lease_term_years' => 'numeric',
            'property_lease_term_months' => 'numeric',
            'property_lease_commencement_date' => 'date',
            'property_rent' => 'numeric',
            'property_other_applicants' => 'max:250',
            'property_occupant_adults' => 'numeric',
            'property_occupant_child' => 'numeric',
            'property_children_age' => 'numeric',

        ];
    }
}
