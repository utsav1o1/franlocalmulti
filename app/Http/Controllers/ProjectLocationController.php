<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProjectLocationRepository;

class ProjectLocationController extends Controller
{
	private $projectLocationRepo;

	public function __construct(ProjectLocationRepository $projectLocationRepo)
	{
		$this->projectLocationRepo = $projectLocationRepo;
	}

    public function showProjectLocations($projectType)
    {
    	$projectLocations = $this->projectLocationRepo->getProjectLocations();

    	return view('frontend.project-locations',
    		[
    			'projectLocations' => $projectLocations,
                'projectType' => $projectType
    		]
    	);
    }

    public function showProjectLocationDetails($projectType, $projectLocation)
    {
        $projectLocation = $this->projectLocationRepo->getProjectLocationDetailsBySlug($projectLocation);

        return view('frontend.project-location-details',
            [
                'projectLocation' => $projectLocation,
                'projectType' => $projectType    
            ]
        );
    }
}
