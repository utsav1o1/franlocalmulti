@extends('layouts.admin.containerlist')

@section('title', 'Properties')

@section('footer_js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#fixed-collapse-navbar li').removeClass('active');

            var oTable = $("#data-table").DataTable();

            $('tbody').on('click','.change-status',function(e){
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
                        url: "{{ url('/admin/property/change/status/') }}",
                        data:{id:id},
                        dataType: 'json',
                        success: function(response){
                            swal('Success',response.message, 'success');
                            if (response.property.is_active == 1) {
                                $($object).children().removeClass('fa-ban');
                                $($object).children().addClass('fa-check-square-o');
                                $($object).attr('title', 'Do you want to deactivate this property?');
                            } else {
                                $($object).children().removeClass('fa-check-square-o');
                                $($object).children().addClass('fa-ban');
                                $($object).attr('title', 'Do you want to activate this property?');
                            }
                        },
                        error: function(e){
                            swal('Oops...','Something went wrong!','error');
                        }
                    });
                });
            });

            $("#PropertyShowModal").on('hidden.bs.modal', function () {
                $(this).data('bs.modal', null);
                $('#PropertyShowModal').removeData('bs.modal');
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
            <li><a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Properties</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">

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
                                <th>Agent</th>
                                <th>Title</th>
                                <th>Property Type</th>
                                <th>Category</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($properties as $index=>$record)
                                <tr id="row_{{ $record->id }}">
                                    <td class="serial">{!! $index+1 !!}</td>
                                    <td class="full_name">{!! $record->agent ? $record->agent->first_name .' '.$record->agent->last_name : '' !!}</td>
                                    <td class="property">{!! $record->property_name !!}</td>
                                    <td class="type">{!! $record->propertyType ? $record->propertyType->property_type : ''!!}</td>
                                    <td class="category">{!! $record->category ? $record->category->property_category : '' !!}</td>
                                    <td class="center is_active">
                                        <a data-toggle="modal"
                                           href="{!! route('admin.property.show', $record->id) !!}"
                                           data-target="#PropertyShowModal" title="View Property">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>&nbsp;&nbsp;
                                    @if($record->is_active == 1)
                                            <a href="javascript:;" class="change-status" title="Do you want to deactivate this property?" id="{{ $record->id }}"><i class="fa fa-check-square-o"></i></a>
                                        @else
                                            <a href="javascript:;" class="change-status" title="Do you want to activate this property?" id="{{ $record->id }}"><i class="fa fa-ban"></i></a>
                                        @endif
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


    <!-- Show package master view model -->
    <div class="modal fade" id="PropertyShowModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            </div>
        </div>
    </div>

@stop