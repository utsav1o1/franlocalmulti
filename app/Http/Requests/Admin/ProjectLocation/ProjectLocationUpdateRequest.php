<?php

namespace App\Http\Requests\Admin\ProjectLocation;

use Route;
use App\Http\Requests\Admin\ProjectLocation\ProjectLocationAddRequest;

class ProjectLocationUpdateRequest extends ProjectLocationAddRequest
{
	public function rules()
    {
        $rules = parent::rules();
        $projectLocationId = Route::current()->parameter('id');

        $rules['location_id'] = 'bail|required|numeric|exists:locations,id|unique:project_locations,location_id,' . $projectLocationId . ',id';
        $rules['location_image'] = 'bail|nullable';
        $rules['master_plan_image'] = 'bail|nullable';

        return $rules;
    }
}