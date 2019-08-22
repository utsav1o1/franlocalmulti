@extends('layouts.admin.containerlist')

@section('title', 'Property Categories')

@section('footer_js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#fixed-collapse-navbar li').removeClass('active');

            var oTable = $("#data-table").DataTable();

            $('table tbody').sortable({
                update: function (event, ui) {
                    var $object = $(this);
                    var categories = $(this).sortable('serialize');
                    var count = parseInt($object.children().first().children('td:nth-child(2)').html());
                    $object.children('tr').each(function () {
                        var sn = parseInt($(this).children('td:nth-child(2)').html());
                        if (sn < count) {
                            count = sn;
                        }
                    });
                    $object.children('tr').each(function () {
                        $(this).children('td:nth-child(2)').html(count);
                        count++;
                    });
                    $.ajax({
                        type: "POST",
                        url: "{{ route('admin.property-category.sort.order') }}",
                        data: {categories: categories, _token: '{{ csrf_token() }}'},
                        success: function (response) {
                            swal("Thank You!", response.message, "success")
                        },
                        error: function (error) {
                            swal("OOPS!", error.message, "error")
                        }
                    });
                }
            });

            $('#data-table').on('click', '.delete-record', function (e) {
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
                        url: "{{ url('/admin/property-category/') }}" + "/" + id,
                        dataType: 'json',
                        success: function (response) {
                            oTable.row($($object).parents('tr')).remove().draw();
                            swal('Success', response.message, 'success');
                        },
                        error: function (e) {
                            swal('Oops...', 'Something went wrong!', 'error');
                        }
                    });
                });
            });

            $('#addPropertyCategoryForm').formValidation({
                framework: 'bootstrap',
                excluded: ':disabled',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    property_category: {
                        validators: {
                            notEmpty: {
                                message: 'The property category is required.'
                            }
                        }
                    },
                }
            }).on('success.form.fv', function (e) {
                // Prevent form submission
                e.preventDefault();
                var $form = $(e.target),
                    fv = $form.data('formValidation');
                $.ajax({
                    type: "POST",
                    url: $form.attr('action'),
                    data: $form.serialize(),
                    dataType: 'json',
                    success: function (response) {
                        debugger;
                        swal('Success', response.message, 'success');
                        $('#addPropertyCategoryForm')[0].reset();
                        $('#addPropertyCategoryModal').modal('hide');

                        var rowNode = oTable.row.add([
                            '<i class="fa fa-arrows"></i>',
                            '',
                            response.propertyCategory.property_category,
                            '<a class="edit-record" href="javascript:;" id="' + response.propertyCategory.id + '" title="Edit property category"><i class="fa fa-pencil-square-o"></i>Edit</a>&nbsp;&nbsp;' +
                            '<a class="delete-record" href="javascript:;" id="' + response.propertyCategory.id + '" title="Delete Record"><i class="fa fa-trash-o"></i>Delete</a>',
                        ]).draw().node();

                        oTable.rows(rowNode).nodes().to$().attr("id", 'row_' + response.propertyCategory.id);
                        $(rowNode).find('td').eq(1).addClass('serial');
                        $(rowNode).find('td').eq(2).addClass('property_category');
                        $(rowNode).find('td').eq(3).addClass('options');
                    },
                    error: function (e) {
                        showErrorMessageInSweatAlert(e);
                    },
                });
            });

            $('#data-table').on('click', '.edit-record', function (e) {
                e.preventDefault();
                $object = $(this);
                var id = $object.attr('id');
                $.ajax({
                    category: "GET",
                    url: "{{ url('/admin/property-category/') }}" + "/" + id,
                    dataType: 'json',
                    success: function (response) {
                        $('#editPropertyCategoryModal').modal().show();
                        $('#editPropertyCategoryModal').find(".property_category_id").val(response.propertyCategory.id);
                        $('#editPropertyCategoryModal').find(".property_category").val(response.propertyCategory.property_category);
                    },
                    error: function (e) {
                        swal('Oops...', 'Something went wrong!', 'error');
                    }
                });
            });

            $('#editPropertyCategoryForm').formValidation({
                framework: 'bootstrap',
                excluded: ':disabled',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    property_category: {
                        validators: {
                            notEmpty: {
                                message: 'The property category is required.'
                            }
                        }
                    },
                }
            }).on('success.form.fv', function (e) {
                // Prevent form submission
                e.preventDefault();
                var $form = $(e.target),
                    fv = $form.data('formValidation');
                $.ajax({
                    type: "PUT",
                    url: $form.attr('action'),
                    data: $form.serialize(),
                    dataType: 'json',
                    success: function (response) {
                        swal('Success', response.message, 'success');
                        $('#editPropertyCategoryForm')[0].reset();
                        $('#data-table').find('#row_' + response.propertyCategory.id).find('.property_category').text(response.propertyCategory.property_category);
                        $('#editPropertyCategoryModal').modal('hide');
                    },
                    error: function (e) {
                        showErrorMessageInSweatAlert(e);
                    },
                });
            });

            $('#addPropertyCategoryModal').on('hidden.bs.modal', function () {
                $('#addPropertyCategoryForm').formValidation('resetForm', true);
            });
            $('#editPropertyCategoryModal').on('hidden.bs.modal', function () {
                $('#editPropertyCategoryForm').formValidation('resetForm', true);
            });
        });
    </script>
@endsection

@section('dynamicdata')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Property Categories
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Property Categories</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                                    data-target="#addPropertyCategoryModal">
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
                                <th>Category</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($propertyCategories as $index=>$record)
                                <tr id="row_{{ $record->id }}">
                                    <td><i class="fa fa-arrows"></i></td>
                                    <td class="serial">{!! $index+1 !!}</td>
                                    <td class="property_category">{!! $record->property_category !!}</td>
                                    <td class="options">
                                        <a href="javascript:void(0)" class="edit-record" id="{!! $record->id !!}"
                                           title="Edit Property Category"><i class="fa fa-fw fa-edit"></i>Edit</a>&nbsp;&nbsp;
                                        <a href="javascript:void(0)" class="delete-record" id="{!! $record->id !!}"
                                           title="Delete Record"><i class="fa  fa-trash-o"></i>Delete</a>
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
    <div class="modal fade" id="addPropertyCategoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">New Property Category</h4>
                </div>
                <form role="form" id="addPropertyCategoryForm" action="{{ route('admin.property-category.store') }}"
                      method="post">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="department">Property Category *</label>
                            <input type="text" class="form-control property_category" name="property_category"
                                   placeholder="Enter property category"/>
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
    <div class="modal fade" id="editPropertyCategoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Property Category</h4>
                </div>
                <form role="form" id="editPropertyCategoryForm"
                      action="{{ route('admin.property-category.update', 'category') }}" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="unitname">Property Category *</label>
                            <input category="text" name="property_category" class="form-control property_category"
                                   placeholder="Enter Property Category"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" class="form-control property_category_id"/>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop