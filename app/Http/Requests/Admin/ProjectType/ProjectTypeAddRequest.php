<?php

namespace App\Http\Requests\Admin\ProjectType;

use Illuminate\Foundation\Http\FormRequest;

class ProjectTypeAddRequest extends FormRequest
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
            'project_type_name' => 'bail|required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'required',
            'max' => 'max length is :max'
        ];
    }
}
