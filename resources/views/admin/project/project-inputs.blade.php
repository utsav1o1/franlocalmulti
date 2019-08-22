<div class="form-group col-md-4">
    <label for="projectName">Project Name</label>
    {!! Form::text('project_name', null, ['class' => 'form-control', 'placeholder' => 'Enter Project Name']) !!}

    @if($errors->has('project_name'))
        <small class="validation-error-message">{{$errors->get('project_name')[0]}}</small>
    @endif
</div>

<div class="clearfix"></div>

<div class="form-group col-md-4">
    <label for="projectTypeId">Project Type</label>

    <?php

        $oldProjectTypeId = session()->getOldInput('project_type_id');
        $oldProjectTypeName = "";

        if(is_null($oldProjectTypeId))
            if(isset($project))
                $oldProjectTypeId = $project->project_type_id;

        if(!is_null($oldProjectTypeId))
            $oldProjectTypeName = ProjectFormHelper::getProjectTypeName($oldProjectTypeId);
    ?>

    @if(is_null($oldProjectTypeId))
        {!! Form::select('project_type_id', [], null, ['class' => 'form-control', 'select2-link' => route('admin.project.project-type-list'), 'placeholder' => 'Select Project Type' ]) !!}
    @else
        {!! Form::select('project_type_id', [$oldProjectTypeId => $oldProjectTypeName], $oldProjectTypeId, ['class' => 'form-control', 'select2-link' => route('admin.project.project-type-list'), 'placeholder' => 'Select Project Type']) !!}
    @endif

    @if($errors->has('project_type_id'))
        <small class="validation-error-message">{{ $errors->get('project_type_id')[0] }}</small>
    @endif

</div>

<div class="form-group col-md-4">
    <label for="locationId">Location</label>

    <?php

        $oldProjectLocationId = session()->getOldInput('project_location_id');
        $oldProjectLocationName = "";

        if(is_null($oldProjectLocationId))
            if(isset($project))
                $oldProjectLocationId = $project->project_location_id;

        if(!is_null($oldProjectLocationId))
            $oldProjectLocationName = ProjectFormHelper::getProjectLocationName($oldProjectLocationId);
    ?>

    @if(is_null($oldProjectLocationId))
        {!! Form::select('project_location_id', [], null, ['class' => 'form-control', 'select2-link' => route('admin.project.project-location-list'), 'placeholder' => 'Select Location']) !!}
    @else
        {!! Form::select('project_location_id', [$oldProjectLocationId => $oldProjectLocationName], $oldProjectLocationId, ['class' => 'form-control', 'select2-link' => route('admin.project.project-location-list'), 'placeholder' => 'Select Location']) !!}
    @endif

    @if($errors->has('project_location_id'))
        <small class="validation-error-message">{{ $errors->get('project_location_id')[0] }}</small>
    @endif

</div>

<div class="clearfix"></div>

<div class="form-group col-md-12">
    <label for="projectImage">Image</label>

    @if(isset($project))

        <div class="fileupload-new thumbnail">
            <img src="{{ asset($project->getProjectImageFullPath()) }}" alt="" id="project-image-upload-preview">
        </div>

    @else

        <div class="fileupload-new thumbnail">
            <img src="{{ asset('storage/noimage.jpg') }}" alt="" id="project-image-upload-preview">
        </div>

    @endif

    {!! Form::file('project_image', ['preview-element-id' => 'project-image-upload-preview']) !!}

    <p class="help-block">Valid file extensions are jpeg, jpg and png.</p>

    @if($errors->has('project_image'))
        <small class="validation-error-message pull-left">{{ $errors->get('project_image')[0] }}
    @endif
</div>