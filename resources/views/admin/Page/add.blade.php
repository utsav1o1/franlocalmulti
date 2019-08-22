@extends('layouts.admin.containerform')

@section('title', 'Add Page')

@section('footer_js')
    <script category="text/javascript">
        $(document).ready(function () {
            $('#fixed-collapse-navbar li').removeClass('active');

            $('#pageAddForm').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    heading: {
                        validators: {
                            notEmpty: {
                                message: 'The page heading is required',
                            }
                        }
                    },
                    description: {
                        validators: {
                            notEmpty: {
                                message: 'The description is required.'
                            },
                        }
                    },
                }
            }).find('[name="description"]')
                .each(function () {
                    $(this)
                        .ckeditor()
                        .editor
                        .on('change', function (e) {
                            $('#pageAddForm').formValidation('revalidateField', e.sender.name);
                        });
                });
        });
    </script>
@endsection

@section('dynamicdata')
    <section class="content-header">
        <h1>
            Pages
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{!! route('admin.page.index') !!}">Pages</a></li>
            <li class="active">Add New</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Page</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @include('layouts.agent.alert')
                    </div>
                    <!--
                        /.box-body
                    -->            <!-- form start -->
                    <form role="form" id="pageAddForm" name="pageAddForm" action="{!! route('admin.page.store') !!}"
                          method="post" enctype="multipart/form-data">

                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <label for="exampleInputAgent">Heading *</label>
                                <input type="text" class="form-control" name="heading"
                                       value="{!! old('heading') !!}" placeholder="Enter page name">
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <label for="exampleInputAgent">Short Description</label>
                                <input type="text" class="form-control" name="short_description"
                                       value="{!! old('short_description') !!}" placeholder="Enter short description">
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <label for="exampleInputAgent">Description *</label>
                                <textarea class="form-control" name="description" col="8">{!! old('description') !!}</textarea>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <label for="exampleInputAgent">Meta Tags</label>
                                <input type="text" class="form-control" name="meta_tags"
                                       value="{!! old('meta_tags') !!}" placeholder="Enter meta tags">
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <label for="exampleInputAgent">Meta Description</label>
                                <input type="text" class="form-control" name="meta_description"
                                       value="{!! old('meta_description') !!}" placeholder="Enter meta description">
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        {!! csrf_field() !!}
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@stop