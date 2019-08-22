@extends('layouts.admin.containerlist')

@section('title', 'Property Types')

@section('footer_js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#fixed-collapse-navbar li').removeClass('active');

            var oTable = $("#data-table").DataTable();

            $('table tbody').sortable({
          update: function (event, ui) {
            var $object = $(this);
            var types = $(this).sortable('serialize');
            var count = parseInt($object.children().first().children('td:nth-child(2)').html());
            $object.children('tr').each(function() {              
              var sn = parseInt($(this).children('td:nth-child(2)').html());
              if(sn < count){
                count = sn;
              }
            });
            $object.children('tr').each(function() {              
              $(this).children('td:nth-child(2)').html(count);
              count++;
            });
            $.ajax({
              type: "POST",
              url: "{{ route('admin.property-type.sort.order') }}",
              data: {types:types,_token:'{{ csrf_token() }}'},
              success: function(response){
                swal("Thank You!", response.message, "success")
              },
              error: function(error){
                swal("OOPS!", error.message, "error")
              }
            });
          }
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
                        url: "{{ url('/admin/property-type/') }}"+"/"+ id,
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

            $('#addPropertyTypeForm').formValidation({
                framework: 'bootstrap',
                excluded: ':disabled',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    property_type: {
                        validators: {
                            notEmpty: {
                                message: 'The property type is required.'
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
                        swal('Success', response.message, 'success');
                        $('#addPropertyTypeForm')[0].reset();
                        $('#addPropertyTypeModal').modal('hide');

                        var rowNode = oTable.row.add([
                            '<i class="fa fa-arrows"></i>',
                            '',
                            response.propertyType.property_type,
                            '<a class="edit-record" href="javascript:;" id="'+ response.propertyType.id +'" title="Edit property type"><i class="fa fa-pencil-square-o"></i>Edit</a>&nbsp;&nbsp;'+
                            '<a class="delete-record" href="javascript:;" id="'+ response.propertyType.id +'" title="Delete Record"><i class="fa fa-trash-o"></i>Delete</a>',
                        ]).draw().node();

                        oTable.rows(rowNode).nodes().to$().attr("id", 'row_'+response.propertyType.id);
                        $( rowNode ).find('td').eq(1).addClass('serial');
                        $( rowNode ).find('td').eq(2).addClass('property_type');
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
                    type: "GET",
                    url: "{{ url('/admin/property-type/') }}"+"/"+ id,
                    dataType: 'json',
                    success: function(response){
                        $('#editPropertyTypeModal').modal().show();
                        $('#editPropertyTypeModal').find(".property_type_id").val(response.propertyType.id);
                        $('#editPropertyTypeModal').find(".property_type").val(response.propertyType.property_type);
                    },
                    error: function(e){
                        swal('Oops...','Something went wrong!','error');
                    }
                });
            });

            $('#editPropertyTypeForm').formValidation({
                framework: 'bootstrap',
                excluded: ':disabled',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    property_type: {
                        validators: {
                            notEmpty: {
                                message: 'The property type is required.'
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
                        $('#editPropertyTypeForm')[0].reset();
                        $('#data-table').find('#row_'+response.propertyType.id).find('.property_type').text(response.propertyType.property_type);
                        $('#editPropertyTypeModal').modal('hide');
                    },
                    error: function(e){
                        showErrorMessageInSweatAlert(e);
                    },
                });
            });

            $('#addPropertyTypeModal').on('hidden.bs.modal', function() {
                $('#addPropertyTypeForm').formValidation('resetForm', true);
            });
            $('#editPropertyTypeModal').on('hidden.bs.modal', function() {
                $('#editPropertyTypeForm').formValidation('resetForm', true);
            });
        });
    </script>
@endsection

@section('dynamicdata')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Property Types
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Property Types</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addPropertyTypeModal">
                                Add New <i class="fa fa-plus"></i>
                            </button>
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="data-table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>SN</th>
                                <th>Type</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($propertyTypes as $index=>$record)
                                <tr id="row_{{ $record->id }}">
                                    <td><i class="fa fa-arrows"></i></td>
                                    <td class="serial">{!! $index+1 !!}</td>
                                    <td class="property_type">{!! $record->property_type !!}</td>
                                    <td class="options">
                                        <a href="javascript:void(0)" class="edit-record" id="{!! $record->id !!}" title="Edit Property Type"><i class="fa fa-fw fa-edit"></i>Edit</a>&nbsp;&nbsp;
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
    <div class="modal fade" id="addPropertyTypeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">New Property Type</h4>
                </div>
                <form role="form" id="addPropertyTypeForm" action="{{ route('admin.property-type.store') }}" method="post">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="department">Property Type *</label>
                            <input type="text" class="form-control property_type" name="property_type" placeholder="Enter property type" />
                        </div>
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
    <div class="modal fade" id="editPropertyTypeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Property Type</h4>
                </div>
                <form role="form" id="editPropertyTypeForm" action="{{ route('admin.property-type.update', 'type') }}" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="unitname">Property Type *</label>
                            <input type="text" name="property_type" class="form-control property_type" placeholder="Enter Property Type" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" class="form-control property_type_id" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop