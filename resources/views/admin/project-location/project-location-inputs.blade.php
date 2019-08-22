<div class="form-group col-md-4">
    <label for="projectTypeName">Project Location Name</label>
    {!! Form::text('project_location_name', null, ['class' => 'form-control', 'placeholder' => 'Enter Project Location Name']) !!}

    @if($errors->has('project_location_name'))
        <small class="validation-error-message">{{$errors->get('project_location_name')[0]}}</small>
    @endif
</div>

<div class="clearfix"></div>

<div class="form-group col-md-4">
    <label for="locationId">Location</label>

    <?php

        $oldLocationId = session()->getOldInput('location_id');
        $oldLocationName = "";

        if(is_null($oldLocationId))
            if(isset($projectLocation))
                $oldLocationId = $projectLocation->location_id;

        if(!is_null($oldLocationId))
            $oldLocationName = ProjectLocationFormHelper::getLocationName($oldLocationId);
    ?>

    @if(is_null($oldLocationId))
        {!! Form::select('location_id', [], null, ['class' => 'form-control', 'select2-link' => route('admin.project-location.location-list'), 'placeholder' => 'Select Location']) !!}
    @else
        {!! Form::select('location_id', [$oldLocationId => $oldLocationName], $oldLocationId, ['class' => 'form-control', 'select2-link' => route('admin.project-location.location-list'), 'placeholder' => 'Select Location']) !!}
    @endif

    @if($errors->has('location_id'))
        <small class="validation-error-message">{{ $errors->get('location_id')[0] }}</small>
    @endif

</div>

<div class="clearfix"></div>

<div class="form-group col-md-12">
    <label for="description">Description *</label>
    {!! Form::textarea('description', null, ['class' => 'form-control', 'col' => '8']) !!}

    @if($errors->has('description'))
        <small class="validation-error-message">{{ $errors->get('description')[0] }}</small>
    @endif
</div>

<div class="clearfix"></div>

<div class="form-group col-md-12">
    <label for="projectImage">Image</label>

    @if(isset($projectLocation))

        <div class="fileupload-new thumbnail">
            <img src="{{ asset($projectLocation->getProjectLocationImageFullPath()) }}" alt="" id="location-image-upload-preview">
        </div>

    @else

        <div class="fileupload-new thumbnail">
            <img src="{{ asset('storage/noimage.jpg') }}" alt="" id="location-image-upload-preview">
        </div>

    @endif

    {!! Form::file('location_image', ['preview-element-id' => 'location-image-upload-preview']) !!}

    <p class="help-block">Valid file extensions are jpeg, jpg and png.</p>

    @if($errors->has('location_image'))
        <small class="validation-error-message pull-left">{{ $errors->get('location_image')[0] }}
    @endif
</div>


<div class="form-group col-md-12">
    <label for="masterPlanImage">Master Plan</label>

    @if(isset($projectLocation))

        <div class="fileupload-new thumbnail">
            <img src="{{ asset($projectLocation->getMasterPlanImageFullPath()) }}" alt="" id="master-plan-image-upload-preview">
        </div>

    @else

        <div class="fileupload-new thumbnail">
            <img src="{{ asset('storage/noimage.jpg') }}" alt="" id="master-plan-image-upload-preview">
        </div>

    @endif

    {!! Form::file('master_plan_image', ['preview-element-id' => 'master-plan-image-upload-preview']) !!}

    <p class="help-block">Valid file extensions are jpeg, jpg and png.</p>

    @if($errors->has('master_plan_image'))
        <small class="validation-error-message pull-left">{{ $errors->get('master_plan_image')[0] }}</small>
    @endif
</div>