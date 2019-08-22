<?php

namespace App\Helpers\Admin;

use App\Models\ProjectType;
use App\Models\ProjectLocation;

class ProjectFormHelper
{
	public static function getProjectLocationName($projectLocationId)
	{
		return ProjectLocation::find($projectLocationId)->project_location_name;
	}

	public static function getProjectTypeName($projectTypeId)
	{
		return ProjectType::find($projectTypeId)->project_type_name;
	}
}