@extends('layouts.admin.containerform')

@section('title', 'Edit Project')

@section('dynamicdata')
    <section class="content-header">
        <h1>
            Projects
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{!! route('admin.project.list') !!}">Projects</a></li>
            <li class="active">Edit</li>
        </ol>
        
        <div class='row col-md-5 alert-message-container'>
          
            @if(Session::has('success'))

                <div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>x</button>
                    <i class='icon fa fa-check'></i>{{ Session::get('success') }}
                </div>

            @elseif(Session::has('error'))
                <div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>x</button>
                    <i class='icon fa fa-times'></i>{{ Session::get('error') }}
                </div>
            @endif

        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Project Details</h3>
                    </div>

                    {!! Form::model($project, ['url' => route('admin.project.update', ['id' => $project->id]), 'method' => 'PUT', 'id' => 'project-edit-form', 'enctype' => "multipart/form-data"]) !!}

                        <div class="box-body">

                            @include('admin.project.project-inputs')

                            <div class="form-group col-md-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>

                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </section>

@stop

@section('footer_js')
    <script category="text/javascript">
        $(document).ready(function () {
            $('#fixed-collapse-navbar li').removeClass('active');
            
            var descriptionInput = $("[name='description']");
            var projectLocationSelectInput = $("[name='project_location_id']");
            var projectTypeSelectInput = $("[name='project_type_id']");
            var projectImageInput = $("[name='project_image']");
            var masterPlanImageInput = $("[name='master_plan_image']");

            descriptionInput.ckeditor();

            projectLocationSelectInput.iniRemoteSelect2({
                url: projectLocationSelectInput.attr('select2-link')
            });

            projectTypeSelectInput.iniRemoteSelect2({
                url: projectTypeSelectInput.attr('select2-link')
            });

            projectImageInput.applyImagePreview();
            masterPlanImageInput.applyImagePreview();
        });
    </script>
@endsection
