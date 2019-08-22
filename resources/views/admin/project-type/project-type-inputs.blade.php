<div class="form-group col-md-4">
    <label for="projectTypeName">Project Type Name</label>
    {!! Form::text('project_type_name', null, ['class' => 'form-control', 'placeholder' => 'Enter Project Type Name']) !!}

    @if($errors->has('project_type_name'))
        <small class="validation-error-message">{{$errors->get('project_type_name')[0]}}</small>
    @endif
</div>

<div class="clearfix"></div>