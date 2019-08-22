@extends('layouts.admin.containerform')

@section('title', 'Edit Project Type')

@section('dynamicdata')
    <section class="content-header">
        <h1>
            Project Types
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{!! route('admin.project.list') !!}">Project Types</a></li>
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
                        <h3 class="box-title">Project Type Details</h3>
                    </div>

                    {!! Form::model($projectType, ['url' => route('admin.project-type.update', ['id' => $projectType->id]), 'method' => 'PUT', 'id' => 'project-type-create-form']) !!}

                        <div class="box-body">

                            @include('admin.project-type.project-type-inputs')

                            <div class="form-group col-md-4">
                                <button type="submit" class="btn btn-primary">Update</button>
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
