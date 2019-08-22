<?php

namespace App\Http\Requests\Admin\Project;

use Illuminate\Foundation\Http\FormRequest;

class ProjectAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->guard('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'project_name' => 'bail|required|max:255',
            'project_location_id' => 'bail|required|numeric|exists:project_locations,id',
            'project_type_id' => 'bail|required|numeric|exists:project_types,id'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'required',
            'max' => 'max length is :max',
            'project_location_id.numeric' => 'invalid',
            'exists' => "doesn't exist"
        ];
    }
}
