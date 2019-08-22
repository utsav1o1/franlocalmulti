@extends('layouts.admin.containerlist')

@section('title', 'Banners')

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
                        url: rootUrl + "/admin/banner/"+id,
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

            $('#data-table').on('click','.change-status',function(e){
                e.preventDefault();
                $object = $(this);
                var id = $object.attr('id');
                swal({
                    title: 'Are you sure?',
                    text: "You are going to change the status!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, change it!'
                }).then(function () {
                    $.ajax({
                        type: "PUT",
                        url: "{{ url('/admin/banner/change/status') }}",
                        data:{id:id},
                        dataType: 'json',
                        success: function(response){
                            swal('Success',response.message, 'success');
                            if (response.banner.is_active == 1) {
                                $($object).children().removeClass('fa-ban');
                                $($object).children().addClass('fa-check-square-o');
                                $($object).attr('title', 'Deactivate');
                            } else {
                                $($object).children().removeClass('fa-check-square-o');
                                $($object).children().addClass('fa-ban');
                                $($object).attr('title', 'Activate');
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

@section('dynamicdata')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Banners
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Banners</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            <a href="{!! route('banner.create') !!}" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a>
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
                                <th>Image</th>
                                <th>Published</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($banners as $index=>$record)
                                <tr id="row_{{ $record->id }}">
                                    <td class="serial">{!! $index+1 !!}</td>
                                    <td class="attachment">
                                        @if(file_exists('storage/banners/'.$record->attachment) && $record->attachment != '')
                                            <img src="{!! asset('storage/banners/'.$record->attachment) !!}" alt="Image" class="img-responsive" style="height:20vh"/>
                                        @else
                                            <img src="{!! asset('storage/noimage.jpg') !!}" alt="Image" class="img-responsive"/>
                                        @endif
                                    </td>
                                    <td class="center is_active">
                                        @if($record->is_active == 1)
                                            <a href="javascript:;" class="change-status" title="Deactivate" id="{{ $record->id }}"><i class="fa fa-check-square-o"></i></a>
                                        @else
                                            <a href="javascript:;" class="change-status" title="Activate" id="{{ $record->id }}"><i class="fa fa-ban"></i></a>
                                        @endif
                                    </td>
                                    <td class="options">
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