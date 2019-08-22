<?php

namespace App\Http\Controllers\Admin;

use Redirect;
use FileHelper;
use Illuminate\Http\Request;
use  App\Transformers\Select2Transformer;

use App\Models\ProjectLocation;

use App\Http\Requests\Admin\ProjectLocation\ProjectLocationAddRequest;
use App\Http\Requests\Admin\ProjectLocation\ProjectLocationUpdateRequest;

use App\Repositories\LocationRepository;
use App\Repositories\ProjectLocationRepository;

use App\Http\Controllers\Controller;

class ProjectLocationController extends Controller
{
	private $projectLocationImagePath;
	private $masterPlanImagePath;

	private $locationRepo;
	private $projectLocationRepo;

	public function __construct(LocationRepository $locationRepo, ProjectLocationRepository $projectLocationRepo)
	{
		$this->projectLocationImagePath = ProjectLocation::getProjectLocationImageDir();
		$this->masterPlanImagePath = ProjectLocation::getMasterPlanImageDir();

		$this->locationRepo = $locationRepo;
		$this->projectLocationRepo = $projectLocationRepo;
	}

	public function showProjectLocations()
	{
        return view('admin.project-location.list',
            [
                'projectLocations' => $this->projectLocationRepo->getProjectLocations()
            ]
        );
	}

	public function showProjectLocationAddInterface()
	{
		return view('admin.project-location.add-interface');
	}

	public function addProjectLocation(ProjectLocationAddRequest $request)
	{
		$inputs = $request->only($this->projectLocationRepo->projectLocationAttrs);

        $projectLocationImageUploadResult = $this->uploadProjectLocationImage();

        if(!$projectLocationImageUploadResult[0])
            return Redirect::back()->withInput()->withErrors(['location_image' => $projectLocationImageUploadResult[1]]);

        $masterPlanImageUploadResult = $this->uploadMasterPlanImage();

        if(!$masterPlanImageUploadResult[0])
        {
            FileHelper::deleteImage($this->projectLocationImagePath . $masterPlanImageUploadResult[1]);

            return Redirect::back()->withInput()->withErrors(['master_plan_image' => $masterPlanImageUploadResult[1]]);
        }

        $inputs['location_image'] = $projectLocationImageUploadResult[1];
        $inputs['master_plan_image'] = $masterPlanImageUploadResult[1];

		try
		{
			$this->projectLocationRepo->addProjectLocation($inputs);
		}
		catch (\Exception $e)
		{
			return $this->serverErrorReply();
		}

		$request->session()->flash('success', 'Project Location Successfully Added!!');

		return redirect()->route('admin.project-location.add-interface');
	}

	public function showProjectLocationEditInterface($id)
	{
		$projectLocation = $this->projectLocationRepo->getProjectLocationForEdit($id);

		return view('admin.project-location.edit-interface',
			[
				'projectLocation' => $projectLocation
			]
		);
	}

	public function updateProjectLocation(ProjectLocationUpdateRequest $request, $id)
	{
		$inputs = $request->only($this->projectLocationRepo->projectLocationAttrs);

        $isProjectLocationImageUploaded = FileHelper::isFileUploaded('location_image');
        $isMasterPlanImageUploaded = FileHelper::isFileUploaded('master_plan_image');

        if($isProjectLocationImageUploaded)
        {
            $projectLocationImageUploadResult = $this->uploadProjectImage();

            if(!$projectLocationImageUploadResult[0])
                return Redirect::back()->withInput()->withErrors(['location_image' => $projectLocationImageUploadResult[1]]);
        }

        if($isMasterPlanImageUploaded)
        {
            $masterPlanImageUploadResult = $this->uploadMasterPlanImage();

            if(!$masterPlanImageUploadResult[0])
            {
                if($isProjectLocationImageUploaded)
                FileHelper::deleteImage($this->projectLocationImagePath . $projectLocationImageUploadResult[1]);

                return Redirect::back()->withInput()->withErrors(['master_plan_image' => $masterPlanImageUploadResult[1]]);
            }
        }

        $inputs['location_image'] = ($isProjectLocationImageUploaded) ? $projectLocationImageUploadResult[1] : null;
        $inputs['master_plan_image'] = ($isMasterPlanImageUploaded) ? $masterPlanImageUploadResult[1] : null;

		$oldProjectLocation = $this->projectLocationRepo->getProjectLocation($id);
		$oldProjectLocationImagePath = $oldProjectLocation->getProjectLocationImageFullPath();
		$oldMasterPlanImagePath = $oldProjectLocation->getMasterPlanImageFullPath();

		try
		{
			$this->projectLocationRepo->updateProjectLocation($inputs, $id);
		}
		catch (\Exception $e)
		{
			return $this->serverErrorReply();
		}

		if($isProjectLocationImageUploaded)
			FileHelper::deleteImage($oldProjectLocationImagePath);

		if($isMasterPlanImageUploaded)
			FileHelper::deleteImage($oldMasterPlanImagePath);

		$request->session()->flash('success', 'Project Location Successfully Updated!!');

		return redirect()->route('admin.project-location.edit-interface', ['id' => $id]);
	}

	public function deleteProjectLocation($id)
	{
		if($this->projectLocationRepo->isProjectLocationUsed($id))
			return $this->errorDataResponse(
				[
					'message' => "Can't delete, the project location is used in some projects!!"
				]
			);

        $oldProjectLocation = $this->projectLocationRepo->getProjectLocation($id);
        $oldProjectLocationImagePath = $oldProjectLocation->getProjectLocationImageFullPath();
        $oldMasterPlanImagePath = $oldProjectLocation->getMasterPlanImageFullPath();

		try
		{
			$this->projectLocationRepo->deleteProjectLocation($id);
		}
		catch(\Exception $e)
		{
			return $this->serverErrorResponse();
		}

        FileHelper::deleteImage($oldProjectLocationImagePath);
        FileHelper::deleteImage($oldMasterPlanImagePath);

		return $this->successDataResponse(
			[
				'message' => 'Project Location Successfully Deleted!!'
			]
		);
	}

	public function getLocationListForProjectLocationForm(Request $request)
	{
        $searchText = $request->has('q') ? $request->input('q') : '';
        $pageLimit = $request->input('pageLimit');

        try {
                $paginatedData = $this->locationRepo->getLocationListForSelect2($searchText, $pageLimit);

        } catch (\Exception $e) {

            return $this->serverErrorResponse();
        }

        $select2Data = Select2Transformer::transformPaginatedDataToSelect2Data($paginatedData);
        
        return $this->successDataResponse($select2Data);
	}

    private function uploadProjectLocationImage()
    {
        return FileHelper::uploadImage($this->projectLocationImagePath, 'location_image',
            [
                'file_name_prefix' => 'location-image-',
                'resize' => [
                    'width' => 4,
                    'height' => 3
                ]
            ]
        );
    }

    private function uploadMasterPlanImage()
    {
    	return FileHelper::uploadImage($this->masterPlanImagePath, 'master_plan_image',
    		[
    			'file_name_prefix' => 'master-plan-image-'
    		]
    	);
    }
}
