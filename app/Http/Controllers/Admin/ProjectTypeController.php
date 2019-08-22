<?php

namespace App\Http\Controllers\Admin;

use Redirect;
use App\Http\Requests\Admin\ProjectType\ProjectTypeAddRequest;
use App\Http\Requests\Admin\ProjectType\ProjectTypeUpdateRequest;

use App\Repositories\ProjectTypeRepository;

use App\Http\Controllers\Controller;

class ProjectTypeController extends Controller
{
	private $projectTypeRepo;

	public function __construct(ProjectTypeRepository $projectTypeRepo)
	{
		$this->projectTypeRepo = $projectTypeRepo;
	}

	public function showProjectTypes()
	{
        return view('admin.project-type.list',
            [
                'projectTypes' => $this->projectTypeRepo->getProjectTypes()
            ]
        );
	}

	public function showProjectTypeAddInterface()
	{
		return view('admin.project-type.add-interface');
	}

	public function addProjectType(ProjectTypeAddRequest $request)
	{
		$inputs = $request->only($this->projectTypeRepo->projectTypeAttrs);

		try
		{
			$this->projectTypeRepo->addProjectType($inputs);
		}
		catch (\Exception $e)
		{
			return $this->serverErrorReply();
		}

		$request->session()->flash('success', 'Project Type Successfully Added!!');

		return redirect()->route('admin.project-type.add-interface');
	}

	public function showProjectTypeEditInterface($id)
	{
		$projectType = $this->projectTypeRepo->getProjectTypeForEdit($id);

		return view('admin.project-type.edit-interface',
			[
				'projectType' => $projectType
			]
		);
	}

	public function updateProjectType(ProjectTypeUpdateRequest $request, $id)
	{
		$inputs = $request->only($this->projectTypeRepo->projectTypeAttrs);

		try
		{

			$this->projectTypeRepo->updateProjectType($inputs, $id);
		}
		catch (\Exception $e)
		{
			return $this->serverErrorReply();
		}

		$request->session()->flash('success', 'Project Type Successfully Updated!!');

		return redirect()->route('admin.project-type.edit-interface', ['id' => $id]);
	}

	public function deleteProjectType($id)
	{
		if($this->projectTypeRepo->isProjectTypeUsed($id))
			return $this->errorDataResponse(
				[
					'message' => "Can't delete, the project type is used in some projects!!"
				]
			);

		try
		{
			$this->projectTypeRepo->deleteProjectType($id);
		}
		catch(\Exception $e)
		{
			return $this->serverErrorResponse();
		}

		return $this->successDataResponse(
			[
				'message' => 'Project Type Successfully Deleted!!'
			]
		);
	}
}
