<?php

namespace App\Http\Requests\Admin\ProjectLocation;

use Illuminate\Foundation\Http\FormRequest;

class ProjectLocationAddRequest extends FormRequest
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
            'project_location_name' => 'bail|required|max:255',
            'location_id' => 'bail|required|numeric|exists:locations,id|unique:project_locations,location_id',
            'location_image' => 'bail|required',
            'master_plan_image' => 'bail|required',
            'description' => 'bail|required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'required',
            'max' => 'max length is :max',
            'location_id.numeric' => 'invalid',
            'exists' => "doesn't exist",
            'unique' => 'already exist'
        ];
    }
}
