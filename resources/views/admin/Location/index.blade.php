@extends('layouts.admin.containerlist')

@section('title', 'Locations')

@section('footer_js')
    <script src="http://maps.googleapis.com/maps/api/js?key={!! env('GOOGLE_MAP_KEY') !!}&secure=false"></script>
    <link rel="stylesheet" type="text/css" href="{!! asset('backend/plugins/latlongpicker/css/jquery-gmaps-latlon-picker.css') !!}"/>
    <script src="{!! asset('backend/plugins/latlongpicker/js/jquery-gmaps-latlon-picker.js') !!}"></script>

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
                        url: "{{ url('/admin/location/') }}"+"/"+ id,
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

            $('#addLocationForm').formValidation({
                framework: 'bootstrap',
                excluded: ':disabled',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    location_name: {
                        validators: {
                            notEmpty: {
                                message: 'The location is required.'
                            }
                        }
                    },
                    postal_code:{
                        validators: {
                            notEmpty: {
                                message: 'The postal code is required.'
                            }
                        }
                    },
                    latitude:{
                        validators:{
                            notEmpty: {
                                message: 'The latitude is required.'
                            }
                        }
                    },
                    longitude:{
                        validators:{
                            notEmpty: {
                                message: 'The longitude is required.'
                            }
                        }
                    },
                }
            }).on('success.form.fv', function(e) {
                // Prevent form submission
                e.preventDefault();
                var $form = $(e.target),
                    fv    = $form.data('formValidation');
                $.ajax({
                    type: "POST",
                    url: $form.attr('action'),
                    data: $form.serialize(),
                    dataType: 'json',
                    success: function(response){
                        debugger;
                        swal('Success', response.message, 'success');
                        $('#addLocationForm')[0].reset();
                        $('#addLocationModal').modal('hide');

                        var rowNode = oTable.row.add([
                            '',
                            response.location.location_name,
                            response.location.postal_code,
                            '<a class="edit-record" href="javascript:;" id="'+ response.location.id +'" title="Edit location"><i class="fa fa-pencil-square-o"></i>Edit</a>&nbsp;&nbsp;'+
                            '<a class="delete-record" href="javascript:;" id="'+ response.location.id +'" title="Delete Record"><i class="fa fa-trash-o"></i>Delete</a>',
                        ]).draw().node();

                        oTable.rows(rowNode).nodes().to$().attr("id", 'row_'+response.location.id);
                        $( rowNode ).find('td').eq(0).addClass('serial');
                        $( rowNode ).find('td').eq(1).addClass('location');
                        $( rowNode ).find('td').eq(2).addClass('postal_code');
                        $( rowNode ).find('td').eq(3).addClass('options');
                    },
                    error: function(e){
                        showErrorMessageInSweatAlert(e);
                    },
                });
            });

            $('#data-table').on('click','.edit-record',function(e){
                e.preventDefault();
                $object = $(this);
                var id = $object.attr('id');
                $.ajax({
                    category: "GET",
                    url: "{{ url('/admin/location/') }}"+"/"+ id,
                    dataType: 'json',
                    success: function(response){
                        $('#editLocationModal').modal().show();
                        $('#editLocationModal').find(".location_id").val(response.location.id);
                        $('#editLocationModal').find(".location_name").val(response.location.location_name);
                        $('#editLocationModal').find(".postal_code").val(response.location.postal_code);
                        $('#editLocationModal').find(".latitude").val(response.location.latitude);
                        $('#editLocationModal').find(".longitude").val(response.location.longitude);
                        $('#editLocationModal').find(".zoom").val(response.location.zoom);
                        $('#editLocationModal').find(".show_in_project").val(response.location.show_in_project);
                    },
                    error: function(e){
                        swal('Oops...','Something went wrong!','error');
                    }
                });
            });

            $('#editLocationForm').formValidation({
                framework: 'bootstrap',
                excluded: ':disabled',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    location_name: {
                        validators: {
                            notEmpty: {
                                message: 'The location is required.'
                            }
                        }
                    },
                    postal_code:{
                        validators: {
                            notEmpty: {
                                message: 'The postal code is required.'
                            }
                        }
                    },
                    latitude:{
                        validators:{
                            notEmpty: {
                                message: 'The latitude is required.'
                            }
                        }
                    },
                    longitude:{
                        validators:{
                            notEmpty: {
                                message: 'The longitude is required.'
                            }
                        }
                    },
                }
            }).on('success.form.fv', function(e) {
                // Prevent form submission
                e.preventDefault();
                var $form = $(e.target),
                    fv    = $form.data('formValidation');
                $.ajax({
                    type: "PUT",
                    url: $form.attr('action'),
                    data: $form.serialize(),
                    dataType: 'json',
                    success: function(response){
                        swal('Success',response.message,'success');
                        $('#editLocationForm')[0].reset();
                        $('#data-table').find('#row_'+response.location.id).find('.location_name').text(response.location.location_name);
                        $('#data-table').find('#row_'+response.location.id).find('.postal_code').text(response.location.postal_code);
                        $('#editLocationModal').modal('hide');
                    },
                    error: function(e){
                        showErrorMessageInSweatAlert(e);
                    },
                });
            });

            $('#addLocationModal').on('hidden.bs.modal', function() {
                $('#addLocationForm').formValidation('resetForm', true);
            });
            $('#editLocationModal').on('hidden.bs.modal', function() {
                $('#editLocationForm').formValidation('resetForm', true);
            });
        });
    </script>
@endsection

@section('dynamicdata')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Locations
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Locations</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addLocationModal">
                                Add New <i class="fa fa-plus"></i>
                            </button>
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="data-table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th>Location</th>
                                <th>Postal Code</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($locations as $index=>$record)
                                <tr id="row_{{ $record->id }}">
                                    <td class="serial">{!! $index+1 !!}</td>
                                    <td class="location_name">{!! $record->location_name !!}</td>
                                    <td class="postal_code">{!! $record->postal_code !!}</td>
                                    <td class="options">
                                        <a href="javascript:void(0)" class="edit-record" id="{!! $record->id !!}" title="Edit Location"><i class="fa fa-fw fa-edit"></i>Edit</a>&nbsp;&nbsp;
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

    <!-- Modal Start -->
    <div class="modal fade" id="addLocationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">New Location</h4>
                </div>
                <form role="form" id="addLocationForm" action="{{ route('admin.location.store') }}" method="post">
                    <div class="modal-body">
                        <div class="form-group col-md-6">
                            <label for="department">Location *</label>
                            <input type="text" class="form-control location_name" name="location_name" placeholder="Enter location" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="department">Postal Code *</label>
                            <input type="number" class="form-control postal_code" name="postal_code" placeholder="Enter postal code" />
                        </div>
                        <div class="clearfix"></div>

                        <div class="form-group col-md-6">
                            <label for="department">Show In Project</label>
                            <select class="form-control" name="show_in_project">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>

                        <fieldset class="gllpLatlonPicker">
                            <div class="control-group">
                                <label class="control-label"></label>
                                <div class="controls">
                                    <div class="gllpMap">Google Map</div>
                                    <br/>
                                </div>
                            </div>


                                <div class="form-group col-md-6">
                                    <label for="exampleInputAgent">Latitude *</label>
                                    <input type="text" class="form-control gllpLatitude" name="latitude" id="latitude"
                                           value="-33" id="latitude" data-required="1">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputAgent">Longitude *</label>
                                    <input type="text" class="form-control gllpLongitude" name="longitude" id="longitude"
                                           value="151" id="latitude" data-required="1">
                                </div>
                            <div class="clearfix"></div>

                            <div class="box-body">
                                <div class="form-group col-md-12">
                                    <label for="exampleInputAgent">Zoom </label>
                                    <input type="text" data-required="1" class="gllpZoom" name="zoom" value="9">
                                    <input type="button" class="gllpUpdateButton" value="update map">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal End -->

    <!-- Modal Start -->
    <div class="modal fade" id="editLocationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Location</h4>
                </div>
                <form role="form" id="editLocationForm" action="{{ route('admin.location.update', 'category') }}" method="post">
                    <div class="modal-body">
                        <div class="form-group col-md-6">
                            <label for="unitname">Location *</label>
                            <input category="text" name="location_name" class="form-control location_name" placeholder="Enter Location" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="department">Postal Code *</label>
                            <input type="number" class="form-control postal_code" name="postal_code" placeholder="Enter postal code" />
                        </div>
                        <div class="clearfix"></div>

                        <div class="form-group col-md-6">
                            <label for="department">Show In Project</label>
                            <select class="form-control show_in_project" name="show_in_project">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>

                        <fieldset class="gllpLatlonPicker">
                            <div class="control-group">
                                <label class="control-label"></label>
                                <div class="controls">
                                    <div class="gllpMap">Google Map</div>
                                    <br/>
                                </div>
                            </div>


                            <div class="form-group col-md-6">
                                <label for="exampleInputAgent">Latitude *</label>
                                <input type="text" class="form-control gllpLatitude latitude" name="latitude"
                                       data-required="1">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputAgent">Longitude *</label>
                                <input type="text" class="form-control gllpLongitude longitude" name="longitude"
                                       data-required="1">
                            </div>
                            <div class="clearfix"></div>

                            <div class="box-body">
                                <div class="form-group col-md-12">
                                    <label for="exampleInputAgent">Zoom </label>
                                    <input type="text" data-required="1" class="gllpZoom zoom" name="zoom">
                                    <input type="button" class="gllpUpdateButton" value="update map">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" class="form-control location_id" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop