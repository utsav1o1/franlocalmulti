<?php

namespace App\Http\Controllers\Admin;

use Redirect;
use FileHelper;
use Illuminate\Http\Request;
use  App\Transformers\Select2Transformer;
use App\Http\Requests\Admin\Project\ProjectAddRequest;
use App\Http\Requests\Admin\Project\ProjectUpdateRequest;

use App\Models\Project;
use App\Repositories\ProjectRepository;
use App\Repositories\ProjectLocationRepository;
use App\Repositories\ProjectTypeRepository;

use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    private $projectImagePath;
    private $masterPlanImagePath;

	private $projectRepo;
    private $projectLocationRepo;
    private $projectTypeRepo;

	public function __construct(ProjectRepository $projectRepo, ProjectLocationRepository $projectLocationRepo, ProjectTypeRepository $projectTypeRepo)
	{
		$this->projectRepo = $projectRepo;
        $this->projectLocationRepo = $projectLocationRepo;
        $this->projectTypeRepo = $projectTypeRepo;

        $this->projectImagePath = Project::getProjectImageDir();
	}

    public function showProjects()
    {
        return view('admin.project.list',
            [
                'projects' => $this->projectRepo->getProjects()
            ]
        );
    }

    /**
     * [show the interface for adding the project]
     * @return [type] [description]
     */
    public function showProjectAddInterface()
    {
    	return view('admin.project.add-interface');
    }

    /**
     * [validate and add project to the database]
     * @param ProjectAddRequest $request [description]
     */
    public function addProject(ProjectAddRequest $request)
    {
    	$inputs = $request->only($this->projectRepo->projectAttrs);

        $projectImageUploadResult = $this->uploadProjectImage();

        if(!$projectImageUploadResult[0])
            return Redirect::back()->withInput()->withErrors(['project_image' => $projectImageUploadResult[1]]);

        $inputs['project_image'] = $projectImageUploadResult[1];

    	try
    	{
    		$this->projectRepo->addProject($inputs);
    	}
    	catch (\Exception $e)
    	{
            return $this->serverErrorReply();
    	}

        $request->session()->flash('success', 'Project Successfully Added!!');

		return redirect()->route('admin.project.add-interface');
    }

    /**
     * [show the interface for editing the project]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function showProjectEditInterface($id)
    {
    	$project = $this->projectRepo->getProjectForEdit($id);

        return view('admin.project.edit-interface',
            [
                'project' => $project
            ]
        );
    }

    /**
     * [validate and update the project in the database]
     * @param  ProjectUpdateRequest $request [description]
     * @param  [type]               $id      [description]
     * @return [type]                        [description]
     */
    public function updateProject(ProjectUpdateRequest $request, $id)
    {
        $inputs = $request->only($this->projectRepo->projectAttrs);
        
        $isProjectImageUploaded = FileHelper::isFileUploaded('project_image');

        if($isProjectImageUploaded)
        {
            $projectImageUploadResult = $this->uploadProjectImage();

            if(!$projectImageUploadResult[0])
                return Redirect::back()->withInput()->withErrors(['project_image' => $projectImageUploadResult[1]]);
        }

        $inputs['project_image'] = ($isProjectImageUploaded) ? $projectImageUploadResult[1] : null;

        $oldProject = $this->projectRepo->getProject($id);

        $oldProjectImagePath = $oldProject->getProjectImageFullPath();

        try
        {
            $this->projectRepo->updateProject($inputs, $id);
        }
        catch (\Exception $e)
        {
            return $this->serverErrorReply();
        }

        if($isProjectImageUploaded)
            FileHelper::deleteImage($oldProjectImagePath);

        $request->session()->flash('success', 'Project Successfully Updated!!');
        
        return redirect()->route('admin.project.edit-interface', ['id' => $id]);
    }

    public function deleteProject($id)
    {
        $oldProject = $this->projectRepo->getProject($id);
        $oldProjectImagePath = $oldProject->getProjectImageFullPath();

        try
        {
            $this->projectRepo->deleteProject($id);
        }
        catch(\Exception $e)
        {
            return $this->serverErrorResponse();
        }

        FileHelper::deleteImage($oldProjectImagePath);

        return $this->successDataResponse(
            [
                'message' => 'Project Successfully Deleted!!'
            ]
        );
    }

    /**
     * [return the project locations list in json format for select2 input in project form]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getProjectLocationListForProjectForm(Request $request)
    {
        $searchText = $request->has('q') ? $request->input('q') : '';
        $pageLimit = $request->input('pageLimit');

        try {
                $paginatedData = $this->projectLocationRepo->getProjectLocationListForSelect2($searchText, $pageLimit);

        } catch (\Exception $e) {

            return $this->serverErrorResponse();
        }

        $select2Data = Select2Transformer::transformPaginatedDataToSelect2Data($paginatedData);
        
        return $this->successDataResponse($select2Data);
    }

    public function getProjectTypeListForProjectForm(Request $request)
    {
        $searchText = $request->has('q') ? $request->input('q') : '';
        $pageLimit = $request->input('pageLimit');

        try {
                $paginatedData = $this->projectTypeRepo->getProjectTypeListForSelect2($searchText, $pageLimit);

        } catch (\Exception $e) {

            return $this->serverErrorResponse();
        }

        $select2Data = Select2Transformer::transformPaginatedDataToSelect2Data($paginatedData);

        return $this->successDataResponse($select2Data);
    }

    private function uploadProjectImage()
    {
        return FileHelper::uploadImage($this->projectImagePath, 'project_image',
            [
                'file_name_prefix' => 'project-image-',
                'resize' => [
                    'width' => 4,
                    'height' => 3
                ]
            ]
        );
    }
}
