@extends('layouts.agent.containerform')

@section('title', 'Add Property Image')

@section('footer_js')
    <script category="text/javascript">
        $(document).ready(function () {
            $('#fixed-collapse-navbar li').removeClass('active');

            $('#addAttachmentForm').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    attachment: {
                        validators: {
                            notEmpty: {
                                message: 'The attachment is required',
                            },
                            file: {
                                extension: 'jpeg,jpg,png',
                                type: 'image/jpeg,image/png',
                                maxSize: 1048576,   // 1024 * 1024
                                message: 'The selected file is not valid or file size greater than 1 MB.'
                            }
                        }
                    },
                }
            });
        });
    </script>
@endsection

@section('dynamicdata')
    <section class="content-header">
        <h1>
            Property Images
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! route('agent.dashboard') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{!! route('agent.property.index') !!}">Properties</a></li>
            <li><a href="{!! route('agent.property.image.index', $property->id) !!}">Images</a></li>
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
                        <h3 class="box-title">Add New Image</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @include('layouts.agent.alert')
                    </div>
                    <!--
                        /.box-body
                    -->
                    <!-- form start -->
                    <form role="form" id="addAttachmentForm" name="addAttachmentForm"
                          action="{!! route('agent.property.image.store', $property->id) !!}"
                          method="post" enctype="multipart/form-data">

                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <label for="exampleInputBanner">Attachment *</label>
                                <div class="fileupload-new thumbnail">
                                    <img src="{{ asset('storage/noimage.jpg') }}" alt="" id="upload-preview"/>
                                </div>
                                <input type="file" name="attachment" id="attachment">
                                <p class="help-block">Valid file extensions are jpeg,jpg and png and should be less than
                                    1 MB.</p>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <input type="hidden" name="property_id" value="{!! $property->id !!}" />
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