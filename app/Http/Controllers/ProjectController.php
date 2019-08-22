<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProjectRepository;

class ProjectController extends Controller
{
	private $projectRepo;

	public function __construct(ProjectRepository $projectRepo)
	{
		$this->projectRepo = $projectRepo;
	}

    public function showProjects($projectType, $projectLocation)
    {
    	$projects = $this->projectRepo->getProjectsByTypeAndLocation($projectType, $projectLocation);

    	return view('project-beta',
    		[
    			'projects' => $projects
    		]
    	);
    }

    public function showProjectPlans($project)
    {
        $projectObj = $this->projectRepo->getProjectBySlug($project);

        return view('project-details-beta',
            [
                'project' => $projectObj
            ]
        );
    }

    public function showProjectProperties($project)
    {
        $properties = $this->projectRepo->getPropertiesOfAProjectBySlug($project);

        return view('frontend.project-properties',
            [
                'properties' => $properties
            ]
        );

    }
}
