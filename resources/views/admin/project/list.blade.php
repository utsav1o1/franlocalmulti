@extends('layouts.admin.containerlist')

@section('title', 'Projects')

@section('dynamicdata')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Projects
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Projects</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            <a href="{!! route('admin.project.add-interface') !!}" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a>
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @include('layouts.admin.alert')
                    </div>
                    <div class="box-body">
                        <table id="data-table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th>Project Name</th>
                                <th>Project Type Name</th>
                                <th>Project Location</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>

                                @foreach($projects as $i => $project)

                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $project->project_name }}</td>
                                        <td>{{ $project->project_type_name }}</td>
                                        <td>{{ $project->project_location_name }}</td>
                                        <td class="options">
                                            <a href="{!! route('admin.project.edit-interface', $project->id) !!}" class="edit-record" title="Edit Project"><i class="fa fa-fw fa-edit"></i>Edit</a>&nbsp;&nbsp;
                                            <a href="javascript:void(0)" class="delete-record" link="{{ route('admin.project.delete', ['id' => $project->id]) }}" title="Delete Record"><i class="fa  fa-trash-o"></i>Delete</a>
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