@extends('layouts.agent.containerlist')

@section('title', 'Images '. $property->property_name)

@section('footer_js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#fixed-collapse-navbar li').removeClass('active');
            var propertyId = "{!! $property->id !!}";
            var oTable = $("#data-table").DataTable();

            $('#data-table').on('click','.make-cover',function(e){
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
                    confirmButtonText: 'Yes, make it cover image!'
                }).then(function () {
                    $.ajax({
                        type: "PUT",
                        url: rootUrl+"/agent/property/"+propertyId+"/image/"+ id +'/makecover',
                        dataType: 'json',
                        success: function(response){
                            swal("Success!", response.message, "success")
                            $("#data-table").find(".make-cover").children().removeClass('fa-check-square-o').addClass('fa-minus-circle');
                            $($object).children().removeClass('fa-minus-circle');
                            $($object).children().addClass('fa-check-square-o');
                        },
                        error: function(e){
                            swal('Oops...','Something went wrong!','error');
                        }
                    });
                });
            });

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
                        url: rootUrl + "/agent/property/"+propertyId+"/image/"+ id ,
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
            Property Images
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! route('agent.dashboard') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{!! route('agent.property.index') !!}">Properties</a></li>
            <li class="active">{!! $property->property_name !!} : Images</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            <a href="{!! route('agent.property.image.create', $property->id) !!}" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a>
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
                                <th>Image</th>
                                <th>Cover Image</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($property->images as $index=>$record)
                                <tr id="row_{{ $record->id }}">
                                    <td class="serial">{!! $index+1 !!}</td>
                                    <td class="attachment">
                                        @if(file_exists('storage/properties/'.$property->id .'/'.$record->attachment) && $record->attachment != '')
                                            <img src="{!! asset('storage/properties/'.$property->id .'/'.$record->attachment) !!}" alt="Image" class="img-responsive" style="height:20vh"/>
                                        @else
                                            <img src="{!! asset('storage/noimage.jpg') !!}" alt="Image" class="img-responsive"/>
                                        @endif
                                    </td>
                                    <td class="cover-image">
                                        @if($record->is_cover == 1)
                                            <a href="javascript:void(0)" class="make-cover" id="{{ $record->id }}" title="Make Cover"><i class="fa fa-check-square-o"></i></a>
                                        @else
                                            <a href="javascript:void(0)" class="make-cover" id="{{ $record->id }}" title="Make Cover"><i class="fa fa-minus-circle"></i></a>
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