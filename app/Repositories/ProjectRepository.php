<?php
namespace App\Repositories;

use App\Models\Project;
use App\Models\Property;

class ProjectRepository
{
	public $projectAttrs = [
		'project_location_id',
		'project_type_id',
		'project_name',
		'project_image'
	];

	public function getProjectsForSelect()
	{
		$projects = Project::pluck('projects.project_name', 'projects.id')->toArray();

		$options = [
			'0' => 'None'
		];

		return array_merge($options, $projects);
	}

	public function getProjects()
	{
		return Project::select('projects.id', 'projects.project_name', 'project_locations.project_location_name', 'project_types.project_type_name')
					  ->leftJoin('project_locations', 'project_locations.id', '=', 'projects.project_location_id')
					  ->leftJoin('project_types', 'project_types.id', '=', 'projects.project_type_id')
					  ->get();
	}

	public function addProject($inputs)
	{
		$newProject = new Project();

		foreach($this->projectAttrs as $attr)
			$newProject->$attr = $inputs[$attr];

		$newProject->save();
	}

	public function updateProject($inputs, $id)
	{
		$oldProject = Project::find($id);

		$oldProject->project_location_id = $inputs['project_location_id'];
		$oldProject->project_name = $inputs['project_name'];

		if(!is_null($inputs['project_image']))
			$oldProject->project_image = $inputs['project_image'];

		$oldProject->save();
	}

	public function deleteProject($id)
	{
		Project::destroy($id);
	}

	public function getProject($id)
	{
		return $this->getProjectForEdit($id);
	}

	public function getProjectBySlug($slug)
	{
		return Project::where('slug', $slug)
					  ->get()
					  ->first();
	}

	public function getProjectForEdit($id)
	{
		return Project::find($id);
	}

	public function getProjectsByTypeAndLocation($projectType, $projectLocation)
	{
		return \App\Models\Corporate\Project::leftJoin('project_types', 'project_types.id', '=', 'projects.project_type_id')
							              	->leftJoin('project_locations', 'project_locations.id', '=', 'projects.project_location_id')
										    ->where('project_types.slug', $projectType)
										    ->where('project_locations.slug', $projectLocation)
										    ->where('projects.branch_id', env('BRANCH_ID'))
										    ->select('projects.id', 'projects.name AS project_name', 'projects.project_image', 'projects.slug')
										    ->get();
	}

	public function getPropertiesOfAProjectBySlug($slug)
	{
		return Property::with(['coverImage', 'agent', 'location', 'contractType', 'propertyType'])
						->leftJoin('projects', 'projects.id', '=', 'properties.project_id')
						->where('is_active', '1')
						->where('projects.slug', $slug)
						->select('properties.*')
						->orderBy('properties.created_at', 'desc')
						->paginate(env('PAGINATE'));
	}
}