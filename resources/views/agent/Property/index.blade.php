@extends('layouts.agent.containerlist')

@section('title', 'Properties')

@section('footer_js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#fixed-collapse-navbar li').removeClass('active');

            var oTable = $("#data-table").DataTable();

            $('#data-table').on('click','.delete-record',function(e){
                e.preventDefault();
                $object = $(this);
                var id = $object.attr('id');
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
                        url: "{{ url('/agent/property/') }}"+"/"+ id,
                        dataType: 'json',
                        success: function(response){
                            oTable.row($($object).parents('tr')).remove().draw();
                            swal('Success',response.message, 'success');
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

@section('dynamicdata')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Properties
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! route('agent.dashboard') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Properties</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            <a href="{!! route('agent.property.create') !!}" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a>
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @include('layouts.agent.alert')
                    </div>
                    <div class="box-body">
                        <table id="data-table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($properties as $index=>$record)
                                <tr id="row_{{ $record->id }}">
                                    <td class="serial">{!! $index+1 !!}</td>
                                    <td class="property_name">
                                        <a href="{!! route('agent.properties.inquiries', $record->id) !!}" title="View Inquiries">{!! $record->property_name !!}</a>
                                    </td>
                                    <td class="price">{!! $record->price !!}</td>
                                    <td class="center is_active">
                                        @if($record->is_active == 1)
                                            <i class="fa fa-check-square-o"></i>
                                        @else
                                            <i class="fa fa-ban"></i>
                                        @endif
                                    </td>
                                    <td class="options">
                                        <a href="{!! route('agent.property.edit', $record->id) !!}" class="edit-record" id="{!! $record->id !!}" title="Edit Property"><i class="fa fa-fw fa-edit"></i>Edit</a>&nbsp;&nbsp;
                                        <a href="{!! route('agent.property.image.index', $record->id) !!}" class="view-images" id="{!! $record->id !!}" title="View Images"><i class="fa fa-fw fa-edit"></i>Images</a>&nbsp;&nbsp;
                                        <a href="javascript:void(0)" class="delete-record" id="{!! $record->id !!}" title="Delete Record"><i class="fa  fa-trash-o"></i>Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@stop