@extends('layouts.admin.containerform')

@section('title', 'Edit Page')

@section('footer_js')
    <script category="text/javascript">
        $(document).ready(function () {
            $('#fixed-collapse-navbar li').removeClass('active');

            $('#pageEditForm').formValidation({
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
                    }, description: {
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
                            $('#pageEditForm').formValidation('revalidateField', e.sender.name);
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
            <li class="active">Edit Page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Page</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @include('layouts.agent.alert')
                    </div>
                    <!-- Custom Tabs -->

                    <form role="form" id="pageEditForm" name="pageEditForm"
                          action="{!! route('admin.page.update', $page->id) !!}"
                          method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <label for="exampleInputAgent">Heading *</label>
                                <input type="text" class="form-control" name="heading"
                                       value="{!! $page->heading !!}" placeholder="Enter page name">
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <label for="exampleInputAgent">Short Description</label>
                                <input type="text" class="form-control" name="short_description"
                                       value="{!! $page->short_description !!}" placeholder="Enter short description">
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <label for="exampleInputAgent">Description *</label>
                                <textarea class="form-control" name="description" col="8">{!! $page->description !!}</textarea>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <label for="exampleInputAgent">Meta Tags</label>
                                <input type="text" class="form-control" name="meta_tags"
                                       value="{!! $page->meta_tags !!}" placeholder="Enter meta tags">
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <label for="exampleInputAgent">Meta Description</label>
                                <input type="text" class="form-control" name="meta_description"
                                       value="{!! $page->meta_description !!}" placeholder="Enter meta description">
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <input type="hidden" name="_method" value="PUT"/>
                        </div>
                        {!! csrf_field() !!}
                    </form>

                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

@stop