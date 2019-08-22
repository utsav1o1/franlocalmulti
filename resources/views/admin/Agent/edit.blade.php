@extends('layouts.admin.containerform')

@section('title', 'Edit Agent')

@section('footer_js')
    <script category="text/javascript">
        $(document).ready(function () {
            $('#fixed-collapse-navbar li').removeClass('active');

            $('#agentEditForm').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    first_name: {validators: {notEmpty: {message: 'The first name is required'}}},
                    last_name: {validators: {notEmpty: {message: 'The last name is required'}}},
                    email_address: {
                        validators: {
                            notEmpty: {message: 'The email address is required'},
                            emailEditress: {message: 'The value is not a valid email address'},
                            stringLength: {max: 512, message: 'Cannot exceed 512 characters'},
                        }
                    },
                    mobile_number: {validators: {notEmpty: {message: 'The mobile number is required'}}},
                    location_id: {validators: {notEmpty: {message: 'The location is required'}}},
                    designation_id: {
                        validators: {
                            notEmpty: {
                                message: 'The position is required'
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
                    attachment: {
                        validators: {
                            file: {
                                extension: 'jpeg,jpg,png',
                                type: 'image/jpeg,image/png',
                                maxSize: 1048576,   // 1024 * 1024
                                message: 'The selected file is not valid or file size greater than 1 MB.'
                            }
                        }
                    },
                }
            }).find('[name="description"]')
                .each(function () {
                    $(this)
                        .ckeditor()
                        .editor
                        .on('change', function (e) {
                            $('#agentEditForm').formValidation('revalidateField', e.sender.name);
                        });
                });
        });
    </script>
@endsection

@section('dynamicdata')
    <section class="content-header">
        <h1>
            Agents
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{!! route('admin.agent.index') !!}">Agents</a></li>
            <li class="active">Edit Agent</li>
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
                        <h3 class="box-title">Edit Agent</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @include('layouts.admin.alert')
                    </div>
                    <!--
                        /.box-body
                    -->            <!-- form start -->
                    <form role="form" id="agentEditForm" name="agentEditForm" action="{!! route('admin.agent.update', $agent->id) !!}"
                          method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group col-md-6">
                                <label for="exampleInputAgent">First Name *</label>
                                <input type="text" class="form-control" name="first_name"
                                       value="{!! $agent->first_name !!}" placeholder="Enter first name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputAgent">Last Name *</label>
                                <input type="text" class="form-control" name="last_name"
                                       value="{!! $agent->last_name !!}" placeholder="Enter last name">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-body">
                            <div class="form-group col-md-6">
                                <label for="exampleInputAgent">Position *</label>
                                <select class="form-control" name="designation_id">
                                    <option value="">Select Position</option>
                                    @foreach($designations as $id=>$designation)
                                        <option value="{!! $id !!}" @if($id == $agent->designation_id) selected="selected" @endif>{!! $designation !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputAgent">Location *</label>
                                <select class="form-control" name="location_id">
                                    <option value="">Select Location</option>
                                    @foreach($locations as $id=>$location)
                                        <option value="{!! $id !!}" @if($id == $agent->location_id) selected="selected" @endif>{!! $location !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group col-md-6">
                                <label for="exampleInputAgent">Email Editress *</label>
                                <input type="email" class="form-control" name="email_address"
                                       value="{!! $agent->email_address !!}" placeholder="Enter email address">
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group col-md-6">
                                <label for="exampleInputAgent">Phone Number</label>
                                <input type="number" class="form-control" name="phone_number"
                                       value="{!! $agent->phone_number !!}" placeholder="Enter phone number">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputAgent">Mobile Number *</label>
                                <input type="number" class="form-control" name="mobile_number"
                                       value="{!! $agent->mobile_number !!}" placeholder="Enter mobile number">
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <label for="exampleInputAgent">Description *</label>
                                <textarea class="form-control" name="description" col="8">{!! $agent->description !!}</textarea>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <label for="exampleInputBanner">Attachment *</label>
                                <div class="fileupload-new thumbnail" >
                                    @if(file_exists('storage/agents/'.$agent->attachment) && $agent->attachment != '')
                                        <img src="{{ asset('storage/agents/'.$agent->attachment) }}" alt="" id="upload-preview">
                                    @else
                                        <img src="{{ asset('storage/noimage.jpg') }}" alt="" id="upload-preview">
                                    @endif
                                </div>
                                <input type="file" name="attachment" id="attachment">
                                <p class="help-block">Valid file extensions are jpeg,jpg and png and should be less than 1 MB.</p>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group col-md-6">
                                <label for="exampleInputAgent">Core Member ?</label>
                                <select class="form-control" name="is_core_member">
                                    <option value="0" {!! ($agent->is_core_member == '0')? 'selected="selected"' : '' !!} >
                                        No
                                    </option>
                                    <option value="1" {!!  ($agent->is_core_member == '1' || $agent->is_core_member == '')? 'selected="selected"' : '' !!} >
                                        Yes
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputAgent">Published ?</label>
                                <select class="form-control" name="is_active">
                                    <option value="0" {!! ($agent->is_active == '0')? 'selected="selected"' : '' !!} >
                                        No
                                    </option>
                                    <option value="1" {!!  ($agent->is_active == '1' || $agent->is_active == '')? 'selected="selected"' : '' !!} >
                                        Yes
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <input type="hidden" name="id" value="{!! $agent->id !!}" />
                            <input type="hidden" name="_method" value="PUT" />
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