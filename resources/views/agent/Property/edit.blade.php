@extends('layouts.agent.containerform')

@section('title', 'Edit Property')

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
                    type_id: {
                        validators: {
                            notEmpty: {
                                message: 'The property type is required',
                            }
                        }
                    },
                    category_id: {
                        validators: {
                            notEmpty: {
                                message: 'The property category is required',
                            }
                        }
                    },
                    location_id: {
                        validators: {
                            notEmpty: {
                                message: 'The location is required',
                            }
                        }
                    },
                    price_type_id: {
                        validators: {
                            notEmpty: {
                                message: 'The price type is required',
                            }
                        }
                    },
                    property_name: {
                        validators: {
                            notEmpty: {
                                message: 'The title is required',
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
                    floor_plan: {
                        validators: {
                            file: {
                                extension: 'jpg,jpeg,png',
                                message: 'The selected file is not valid.'
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



            $(".gllpLatlonPicker").each(function () {
                $obj = $(document).gMapsLatLonPicker();

                $obj.params.strings.markerText = "Drag this Marker (example edit)";

                $obj.params.displayError = function (message) {
                    console.log("MAPS ERROR: " + message); // instead of alert()
                };

                $obj.init($(this));
            });

            $("select[name='price_type_id']").change(function() {
                if($(this).val() == 5) {
                    $("input[name='price']").parent().removeClass('col-md-4').addClass('col-md-2');
                    $("input[name='price']").prev().html("Price From");
                    $("input[name='price_to']").parent().show();
                } else {
                    $("input[name='price']").parent().removeClass('col-md-2').addClass('col-md-4');
                    $("input[name='price']").prev().html('Price *');
                    $("input[name='price_to']").parent().hide();
                }
            });

            $("select[name='price_type_id']").change();
        });
    </script>
@endsection

@section('dynamicdata')
    <section class="content-header">
        <h1>
            Properties
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! route('agent.dashboard') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{!! route('agent.property.index') !!}">Properties</a></li>
            <li class="active">Edit Property</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Property</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @include('layouts.agent.alert')
                    </div>
                    <!-- Custom Tabs -->

                    <form role="form" id="agentEditForm" name="agentEditForm"
                          action="{!! route('agent.property.update', $property->id) !!}"
                          method="post" enctype="multipart/form-data">

                        <div class="box-body">
                            <div class="form-group col-md-4">
                                <label for="exampleInputAgent">Property Category</label>
                                <select class="form-control" name="category_id">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $key=>$category)
                                        <option value="{!! $category->id !!}"
                                                @if($category->id == $property->category_id) selected="selected" @endif>{!! $category->property_category !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputAgent">Property Type</label>
                                <select class="form-control" name="type_id">
                                    <option value="">Select Type</option>
                                    @foreach($types as $key=>$type)
                                        <option value="{!! $type->id !!}"
                                                @if($type->id == $property->type_id) selected="selected" @endif>{!! $type->property_type !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputAgent">Location</label>
                                <select class="form-control" name="location_id">
                                    <option value="">Select Location</option>
                                    @foreach($locations as $key=>$location)
                                        <option value="{!! $key !!}" @if($key == $property->location_id) selected="selected" @endif>{!! $location !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group col-md-8">
                                <label for="exampleInputAgent">Title *</label>
                                <input type="text" class="form-control" name="property_name"
                                       value="{!! $property->property_name !!}" placeholder="Enter property name">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputAgent">Contract Type</label>
                                <select class="form-control" name="contract_type_id">
                                    <option value="">Select Type</option>
                                    @foreach($contractTypes as $id=>$type)
                                        <option value="{!! $id !!}"
                                                @if($id == $property->contract_type_id) selected="selected" @endif>{!! $type !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group col-md-4">
                                <label for="exampleInputAgent">Number of Bedrooms</label>
                                <select class="form-control" name="number_of_bedrooms">
                                    <option value="">Select</option>
                                    @for ($i = 0; $i <= 10; $i++)
                                        <option value="{!! $i !!}"
                                                @if($i == $property->number_of_bedrooms) selected="selected" @endif>{!! $i !!}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputAgent">Number of Bathrooms</label>
                                <select class="form-control" name="number_of_bathrooms">
                                    <option value="">Select</option>
                                    @for ($i = 0; $i <= 10; $i++)
                                        <option value="{!! $i !!}"
                                                @if($i == $property->number_of_bathrooms) selected="selected" @endif>{!! $i !!}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputAgent">Number of Garages</label>
                                <select class="form-control" name="number_of_garages">
                                    <option value="">Select</option>
                                    @for ($i = 0; $i <= 10; $i++)
                                        <option value="{!! $i !!}"
                                                @if($i == $property->number_of_garages) selected="selected" @endif>{!! $i !!}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group col-md-4">
                                <label for="exampleInputAgent">Price Type</label>
                                <select class="form-control" name="price_type_id">
                                    <option value="">Select Type</option>
                                    @foreach($priceTypes as $id=>$type)
                                        <option value="{!! $id !!}"
                                                @if($id == $property->price_type_id) selected="selected" @endif>{!! $type !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputAgent">Price *</label>
                                <input type="number" class="form-control" name="price"
                                       value="{!! $property->price !!}" data-required="1">
                            </div>
                            <div class="form-group col-md-2" style="display: none;">
                                <label for="exampleInputAgent">Price To</label>
                                <input type="number" class="form-control" name="price_to" value="{!! $property->price_to !!}"/>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputAgent">Area  In Square meter</label>
                                <input type="number" class="form-control" name="area"
                                       value="{!! $property->area !!}" step-size="0.01">
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group col-md-4">
                                <label>Project</label>
                                {!! Form::select('project_id', $projects, (isset($property) && $property->project_id != null) ? $property->project_id : 0, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <label for="exampleInputAgent">Description *</label>
                                <textarea class="form-control" name="description"
                                          col="8">{!! $property->description !!}</textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-xs-11">
                            <label for="attachment">Floor Plan</label>
                            <div class="fileupload-new thumbnail">
                                @if(file_exists('storage/properties/'.$property->id .'/'.$property->floor_plan) && $property->floor_plan!='')
                                    <img src="{{ asset('storage/properties/'.$property->id .'/'.$property->floor_plan) }}" alt="" id="upload-preview">
                                @else
                                    <img src="{{ asset('storage/noimage.jpg') }}" alt="" id="upload-preview">
                                @endif
                            </div>
                            <input type="file" name="floor_plan" id="attachment">
                            <p class="help-block">Valid file extensions are jpeg,jpg and png.</p>
                        </div>
                        <div class="clearfix"></div>

                        <fieldset class="gllpLatlonPicker">
                            <div class="box-body">
                                <div class="form-group col-md-12">
                                    <label class="control-label"></label>
                                    <div class="controls">
                                        <div class="gllpMap">Google Maps</div>
                                        <br/>
                                    </div>
                                </div>
                            </div>

                            <div class="box-body">
                                <div class="form-group col-md-12">
                                    <label for="exampleInputAgent">Latitude *</label>
                                    <input type="text" class="form-control gllpLatitude" name="latitude" id="latitude"
                                           value="{!! $property->latitude !!}" id="latitude" data-required="1">
                                </div>
                            </div>

                            <div class="box-body">
                                <div class="form-group col-md-12">
                                    <label for="exampleInputAgent">Longitude *</label>
                                    <input type="text" class="form-control gllpLongitude" name="longitude"
                                           id="longitude"
                                           value="{!! $property->longitude !!}" id="latitude" data-required="1">
                                </div>
                            </div>

                            <div class="box-body">
                                <div class="form-group col-md-12">
                                    <label for="exampleInputAgent">Zoom </label>
                                    <input type="text" data-required="1" class="gllpZoom" name="zoom"
                                           value="{!! $property->zoom !!}">
                                    <input type="button" class="gllpUpdateButton" value="update map">
                                </div>
                            </div>
                        </fieldset>

                        <div class="box-body">
                            <div class="form-group col-md-6">
                                <label for="exampleInputAgent">Rent ?</label>
                                <select class="form-control" name="is_rent">
                                    <option value="0" @if($property->is_rent == 0) selected="selected" @endif>No</option>
                                    <option value="1" @if($property->is_rent == 1) selected="selected" @endif>Yes</option>
                                </select>
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