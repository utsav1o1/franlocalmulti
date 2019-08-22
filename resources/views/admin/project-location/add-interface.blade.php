@extends('layouts.admin.containerform')

@section('title', 'Add Project Location')

@section('dynamicdata')
    <section class="content-header">
        <h1>
            Project Locations
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{!! route('admin.project-location.list') !!}">Project Locations</a></li>
            <li class="active">Add</li>
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
                        <h3 class="box-title">Project Location Details</h3>
                    </div>

                    {!! Form::open(['url' => route('admin.project-location.add'), 'id' => 'project-location-create-form', 'enctype' => "multipart/form-data"]) !!}

                        <div class="box-body">

                            @include('admin.project-location.project-location-inputs')

                            <div class="form-group col-md-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@stop

@section('footer_js')
    <script category="text/javascript">
        $(document).ready(function () {

            var locationSelectInput = $("[name='location_id']");
            var projectLocationImageInput = $("[name='location_image']");
            var masterPlanImageInput = $("[name='master_plan_image']");
            var descriptionInput = $("[name='description']");

            locationSelectInput.iniRemoteSelect2({
                url: locationSelectInput.attr('select2-link')
            });

            projectLocationImageInput.applyImagePreview();
            masterPlanImageInput.applyImagePreview();
            descriptionInput.ckeditor();
        });
    </script>
@endsection