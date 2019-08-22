<?php

namespace App\Repositories;

use App\Models\Project;
use App\Models\ProjectLocation;

class ProjectLocationRepository
{
	public $projectLocationAttrs = [
		'project_location_name',
		'location_image',
		'master_plan_image',
		'description',
		'location_id'
	];

	public function getProjectLocations()
	{
		return \App\Models\Corporate\ProjectLocation::select('id', 'name AS project_location_name', 'slug', 'location_image')
												    ->where('branch_id', env('BRANCH_ID'))
													->get();
	}

	public function addProjectLocation($inputs)
	{
		$newProjectLocation = new ProjectLocation();

		foreach($this->projectLocationAttrs as $attr)
			$newProjectLocation->$attr = $inputs[$attr];

		$newProjectLocation->save();
	}

	public function getProjectLocation($id)
	{
		return $this->getProjectLocationForEdit($id);
	}

	public function getProjectLocationDetailsBySlug($projectLocation)
	{
		return \App\Models\Corporate\ProjectLocation::where('slug', $projectLocation)

		->where('branch_id', env("BRANCH_ID"))
		->first();
	}

	public function getProjectLocationForEdit($id)
	{
		return ProjectLocation::find($id);
	}

	public function updateProjectLocation($inputs, $id)
	{
		$oldProjectLocation = ProjectLocation::find($id);

		$oldProjectLocation->project_location_name = $inputs['project_location_name'];
		$oldProjectLocation->location_id = $inputs['location_id'];

		if(!is_null($inputs['location_image']))
			$oldProjectLocation->location_image = $inputs['location_image'];

		if(!is_null($inputs['master_plan_image']))
			$oldProjectLocation->master_plan_image = $inputs['master_plan_image'];
		
		$oldProjectLocation->save();
	}

	public function isProjectLocationUsed($id)
	{
		return Project::where('project_location_id', $id)->count() > 0;
	}

	public function deleteProjectLocation($id)
	{
		ProjectLocation::destroy($id);
	}

	public function getProjectLocationListForSelect2($searchText, $pageLimit)
	{
    	return ProjectLocation::where('project_location_name', 'LIKE', "%{$searchText}%")
    				   ->select('id', 'project_location_name AS text')
    				   ->paginate($pageLimit)
    				   ->toArray();
	}
}