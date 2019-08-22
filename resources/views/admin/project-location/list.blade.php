@extends('layouts.admin.containerlist')

@section('title', 'Project Locations')

@section('dynamicdata')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Project Locations
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Project Locations</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            <a href="{!! route('admin.project-location.add-interface') !!}" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a>
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @include('layouts.admin.alert')
                    </div>
                    <div class="box-body table-responsive">
                        <table id="data-table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th>Location Image</th>
                                <th>Project Location Name</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>

                                @foreach($projectLocations as $i => $projectLocation)

                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>
                                            <div class="location-image-container">
                                                <img style="height: 50px" class="img-responsive" src="{{ asset($projectLocation->getProjectLocationImageFullPath()) }}"/.>
                                            </div>
                                        </td>
                                        <td>{{ $projectLocation->project_location_name }}</td>
                                        <td class="options">
                                            <a href="{!! route('admin.project-location.edit-interface', $projectLocation->id) !!}" class="edit-record" title="Edit Project Location"><i class="fa fa-fw fa-edit"></i>Edit</a>&nbsp;&nbsp;
                                            <a href="javascript:void(0)" class="delete-record" link="{{ route('admin.project-location.delete', ['id' => $projectLocation->id]) }}" title="Delete Record"><i class="fa  fa-trash-o"></i>Delete</a>
                                        </td>
                                    </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop

@section('footer_js')
    <script type="text/javascript">
        $(document).ready(function () {

            var oTable = $("#data-table").DataTable();

            $('#data-table').on('click','.delete-record', function(e) {

                e.preventDefault();

                deleteBtn = $(this);

                var deleteUrl = deleteBtn.attr('link');

                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then(function () {
                    $.ajax({
                        type: "DELETE",
                        url: deleteUrl,
                        dataType: 'json',
                        success: function(response) {

                            if(response['status']) {
                                switch(response['status']) {
                                    case 'success': {

                                        oTable.row($(deleteBtn).parents('tr')).remove().draw();
                                        swal('Success', response.message, 'success');
                                    } break;

                                    case 'error': {
                                        swal('Oops...', response.message, 'error');
                                    } break;
                                }
                            }
                        },
                        error: function(e){
                            swal('Oops...','Something went wrong!','error');
                        }
                    });
                });
            });
        });
    </script>
@endsection