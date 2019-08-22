<?php
namespace App\Repositories;

use App\Models\Project;
use App\Models\Corporate\ProjectType;

class ProjectTypeRepository
{
	public $projectTypeAttrs = [
		'project_type_name'
	];

	public function getProjectTypes()
	{
		return ProjectType::select('id', 'project_type_name')
						  ->get();
	}

	public function getProjectTypeMenus()
	{
		return ProjectType::all();
	}

	public function addProjectType($inputs)
	{
		$newProjectType = new ProjectType();

		$newProjectType->project_type_name = $inputs['project_type_name'];

		$newProjectType->save();
	}

	public function getProjectTypeForEdit($id)
	{
		return ProjectType::find($id);
	}

	public function updateProjectType($inputs, $id)
	{
		$oldProjectType = ProjectType::find($id);

		$oldProjectType->project_type_name = $inputs['project_type_name'];

		$oldProjectType->save();
	}

	public function isProjectTypeUsed($id)
	{
		return Project::where('project_type_id', $id)->count() > 0;
	}

	public function deleteProjectType($id)
	{
		ProjectType::destroy($id);
	}

	public function getProjectTypeListForSelect2($searchText, $pageLimit)
	{
    	return ProjectType::where('project_type_name', 'LIKE', "%{$searchText}%")
    				   ->select('id', 'project_type_name AS text')
    				   ->paginate($pageLimit)
    				   ->toArray();
	}
}