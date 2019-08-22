<?php

namespace App\Helpers\Admin;

use App\Models\Location;

class ProjectLocationFormHelper
{
	public static function getLocationName($locationId)
	{
		return Location::find($locationId)->location_name;
	}
}