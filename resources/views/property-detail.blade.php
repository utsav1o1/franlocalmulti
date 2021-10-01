@extends('layouts.app')

@section('title', $property->name)
@section('meta_keywords', $property->name)
@section('meta_description', $property->name)

@section('extra_meta')

    <meta property="og:url" content="{!! route('properties.show', $property->slug) !!}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $property->name }}" />
    <meta property="og:description" content="{{ strip_tags($property->description) }}" />
    <meta property="og:image"   content="{!! url($property->getCoverImage()) !!}" />

@endsection

@section('header_css')
    <style>#gmap_canvas img {
            max-width: none !important;
            background: none !important
        }</style>
    <link href="{{ asset('backend/plugins/sweetalert/dist/sweetalert2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/plugins/formValidation/formValidation.min.css') }}" rel="stylesheet">
@endsection

@section('bodystart')
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=911895265634736";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
@endsection

@section('footer_js')
    <script src="{{ asset('backend/plugins/sweetalert/dist/sweetalert2.min.js') }}"></script>
    <!-- formValidation -->
    <script src="{{ asset('backend/plugins/formValidation/formValidation.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/formValidation/bootstrap.min.js') }}"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key={!! env('GOOGLE_MAP_KEY') !!}&secure=false"
            type="text/javascript"></script>
    <script type="text/javascript">
        var propertyId = parseInt('{!! $property->id !!}');
        var latitude = '{!! $property->latitude !!}';
        var longitude = '{!! $property->longitude !!}';
        var zoomValue = parseInt('{!! 11 !!}');
        var name = '{!! $property->name !!}';
        var address = '{!! $property->location ? $property->location_name : '' !!}';

        function init_map() {
            var myOptions = {
                zoom: zoomValue,
                center: new google.maps.LatLng(latitude, longitude),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
            marker = new google.maps.Marker({map: map, position: new google.maps.LatLng(latitude, longitude)});
            infowindow = new google.maps.InfoWindow({content: "<b>" + name + " </b><br/>" + address});
            google.maps.event.addListener(marker, "click", function () {
                infowindow.open(map, marker);
            });
            infowindow.open(map, marker);
        }

        google.maps.event.addDomListener(window, 'load', init_map);

        $(document).ready(function () {
            $("#sendEmailForm").formValidation({
                framework: "bootstrap",
                icon: {
                    valid: "glyphicon glyphicon-ok",
                    invalid: "glyphicon glyphicon-remove",
                    validating: "glyphicon glyphicon-refresh"
                },
                fields: {
                    email_address: {
                        validators: {
                            notEmpty: {
                                message: "The email address is required"
                            },
                            emailAddress: {
                                message: "The email address is not valid"
                            }
                        }
                    }
                }
            }).on('success.form.fv', function (e) {
                e.preventDefault();
                var $form = $(e.target),
                    fv = $form.data('formValidation');
                $.ajax({
                    type: "POST",
                    url: $form.attr('action'),
                    data: $form.serialize(),
                    dataType: 'json',
                    success: function (response) {
                        swal('Success', response.message, 'success');
                        $('#sendEmailForm')[0].reset();
                        $('#sendEmailModal').modal('hide');
                    },
                    error: function (err) {
                        swal('Error', err.message, 'error');
                    },
                });
            });

            $('#save-property').on('click', function (e) {
                e.preventDefault();
                $object = $(this);
                var id = $object.attr('id');
                $.ajax({
                    type: "POST",
                    url: "{{ url('/property/save') }}",
                    data: {property_id: propertyId, _token: '{{ csrf_token() }}'},
                    dataType: 'json',
                    success: function (response) {
                        swal('Success', response.message, 'success');
                        $($object).parent('li').html('<button class="btn btn-info btn-lg detail-btn"><span class="glyphicon glyphicon-pushpin"></span>Saved</button>');
                    },
                    error: function (error) {
                        debugger;
                        swal('Sign In First', error.responseJSON.message, 'error');
                    }
                });
            });

            $('#inquiry-us-button').on('click', function (e) {
                $('#inquiry-tab-link').click();
            });
        });
    </script>
@endsection

@section('dynamicdata')
    <!--Page Details-->
    <div class="container property-details-page">
        <div class="row custom-top-spacing">
            <div class="col-sm-9 col-md-9">
                <!--Start of Image Carousel-->
                <div class="row">

                    <?php
                        
                        $propertyImages = $property->getImages();

                    ?>

                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">


                            @if(count($propertyImages) > 0)
                                @foreach($propertyImages as $index => $image)
                                        <li data-target="#myCarousel" data-slide-to="{!! $index !!}"
                                            class="@if($index == 0) active @endif"></li>
                                @endforeach
                            @endif


                        </ol>
                        <div class="carousel-inner detail-carousel" role="listbox">

                            @if(count($propertyImages) > 0)

                                @foreach($propertyImages as $index => $image)
                                    <div class="item @if($index == 0) active @endif">
                                        <img class="d-block img-fluid"
                                             src="{{ url($image->getPropertyImagePath()) }}"
                                             alt="{!! $property->name !!}">
                                    </div>
                                @endforeach

                            @else

                                <div class="item active">
                                    <img class="d-block img-fluid"
                                         src="{{ url($property->getDefaultPropertyImagePath()) }}"
                                         alt="{!! $property->name !!}">
                                </div>

                            @endif
                        </div>
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <!--Back Print Save-->
                <div class="row">
                    <div class="detail-print-container">
                        <ul class="nav detail-print">

                            <li><a href="{!! url()->previous() !!}" class="btn btn-info detail-btn"><span
                                            class="glyphicon glyphicon-menu-left"></span>Back</a></li>
                            <li><a href="{!! route('properties.print', $property->slug) !!}" target="_blank"
                                   class="btn btn-info detail-btn"><span
                                            class="glyphicon glyphicon-print"></span>Print</a></li>
                            <li>
                                @if($existFlag)
                                    <button class="btn btn-info detail-btn"><span
                                                class="glyphicon glyphicon-pushpin"></span>Saved
                                    </button>
                                @else
                                    <a href="javascript:;" id="save-property" class="btn btn-info detail-btn"><span
                                                class="glyphicon glyphicon-pushpin"></span>Save</a>
                                @endif
                            </li>
                            <li>
                                <a class="btn btn-info detail-btn" data-toggle="modal" data-target="#sendEmailModal">
                                    <span class="glyphicon glyphicon-message"></span>Email</a>
                            </li>

                            <li class="fb-share">
                                <div class="fb-share-button"
                                     data-href="{!! route('properties.show', $property->slug) !!}"
                                     data-layout="button_count" data-size="large" data-mobile-iframe="true">
                                    <a class="fb-xfbml-parse-ignore" target="_blank"
                                       href="https://www.facebook.com/sharer/sharer.php?u={!! urlencode(route('properties.show', $property->slug)) !!}&amp;src=sdkpreparse">Share</a>
                                </div>
                            </li>
                            <li>
                                <a class="btn btn-info detail-btn" id="inquiry-us-button" href="#has-inquiry-tab">Inquiry Us</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="thumbnail">
                        <div class="thumbnail recent-properties-box">
                            <!--Caption Detail-->
                            <div class="caption detail">
                                <header>
                                    <!--Area Block-->
                                    <div class="area-block">
                                        <div class="property-type">
                                            Property Type
                                            : {!! $property->property_type_name !!}
                                        </div>
                                        <div class="property-area">
                                            {!! $property->price_type_name !!}
                                            <div class="st-price">{{ $property->getFormattedPrice() }}</div>
                                        </div>
                                    </div>
                                </header>

                                @if($property->location)
                                    <h3 class="location_nameation">
                                        <a><i class="fa fa-map-marker"></i>&nbsp;{!! $property->location_name !!}</a>
                                    </h3>
                                @endif

                                <!--Item Details-->
                                <ul class="item-details">
                                    <li>
                                        @if($property->area > 0)
                                            <p class="item-area">{!! $property->area !!} m<sup>2</sup></p>
                                        @endif
                                    </li>
                                    <li>
                                        <p class="item-bed">{!! $property->number_of_bedrooms !!}
                                            Bedroom</p>
                                    </li>
                                    <li>
                                        <p class="item-bath">{!! $property->number_of_bathrooms !!}
                                            Bathroom</p>
                                    </li>
                                    <li>
                                        <p class="item-garage">{!! $property->number_of_garages !!}
                                            Garage</p>
                                    </li>
                                </ul>

                                <div id="agent-details-navigation"></div>
                                
                                <div class="detail-footer">
                                    <a href="#agent-details-navigation"><i class="fa-user"></i> {{ $property->agents_count }} {{ ($property->agents_count < 2) ? 'agent' : 'agents' }}</a>
                                    <span><i class="fa-calendar-o"></i>{!! App\Http\Helper::time_elapsed_string($property->created_at) !!}</span>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>


    
                <?php

                    $agents = $property->getPropertyAgents();

                ?>
                @foreach($agents as $agent)
                    <a class="agent-detail-link" href="{!! route('agents.show', encrypt($agent->id)) !!}" >
                        <div class="col-lg-4 col-md-4 col-sm-6 agent-block">
                            <div class="agent-wrapper">
                                <div class="agent-image">
                                    <a>
        
                                    <img src="{!! asset($agent->getAgentImagePath()) !!}"
                                         alt="{!! $agent->first_name .' '. $agent->last_name !!}"
                                         class="img-responsive"/>
                                        
                                    </a>
                                </div>
                                <div class="agent-text">
                                    <h5><a href="{!! route('agents.show', encrypt($agent->id)) !!}">{!! $agent->first_name .' '. $agent->last_name !!}</a></h5>
                                    <p class="designation"></p>
                                    <div class="agent-short-contact">
                                        @if($agent->phone_number)
                                            <p>
                                                <a href="tel:{!! $agent->phone_number !!}"><i class="glyphicon glyphicon-phone-alt"></i>{!! substr($agent->phone_number,0,2).' '.substr($agent->phone_number,2,4).' '. substr($agent->phone_number,6) !!}</a>
                                            </p>
                                        @endif
                                        @if($agent->mobile_number)
                                            <p>
                                                <a href="tel:{!! $agent->mobile_number !!}"><i class="glyphicon glyphicon-phone"></i>{!! substr($agent->mobile_number,0,4). ' '  .substr($agent->mobile_number,4,3).' '.substr($agent->mobile_number,7) !!}</a>
                                            </p>
                                        @endif
                                        @if($agent->email)
                                        <p>
                                            <a href="mailto:{!! $agent->email !!}"><i class="glyphicon glyphicon-envelope"></i>{!! str_limit($agent->email, 20) !!}</a>
                                        </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach 

                <div class="clearfix"></div>



                <!--Start of Details Page Tab-->
                <div class="row" id="has-inquiry-tab">
                    <div class="detail-content-wrap">
                        <ul class="nav nav-tabs">
                            <li @unless(session('success_message') || session('warning_message') || count($errors) > 0) class="active" @endunless>
                                <a data-toggle="tab" href="#description">Description</a></li>
                            @if(file_exists('storage/properties/'.$property->id.'/'.$property->floor_plan ) && $property->floor_plan != '')
                                <li><a data-toggle="tab" href="#floor_plan">Floor Plan</a></li>
                            @endif
                            <li @if(session('success_message') || session('warning_message') || count($errors) > 0) class="active" @endif>
                                <a data-toggle="tab" href="#inquiry" id="inquiry-tab-link">Inquiry</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="description"
                                 @if(session('success_message') || session('warning_message') || count($errors) > 0) class="tab-pane fade"
                                 @else class="tab-pane fade in active" @endif>
                                <h3>{!! $property->name !!}</h3>
                                <div>{!! $property->description !!}</div>
                                <div class="row map-container">
                                    <div class="col-sm-12 col-md-12">
                                        <h4>{!! $property->location_name !!}</h4>
                                        <div class="google_map">
                                            <div id="gmap_canvas" style="height:400px;width:100%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(file_exists('storage/properties/'.$property->id.'/'.$property->floor_plan ) && $property->floor_plan != '')
                            <div id="floor_plan" class="tab-pane fade">
                                <div>
                                        <img class="img-responsive"
                                             src="{!! asset('storage/properties/'.$property->id.'/'.$property->floor_plan) !!}"
                                             alt="{!! $property->name !!}">
                                </div>
                            </div>
                            @endif
                            <div id="inquiry"
                                 @if(session('success_message') || session('warning_message') || count($errors) > 0) class="tab-pane fade in active"
                                 @else class="tab-pane fade" @endif>
                                <h3>Inquiry for the Property</h3>
                                <div>
                                    @include('layouts.alert')
                                    <form action="{!! route('properties.submit.contact', $property->id) !!}"
                                          method="post">
                                        <div class="row agent-field">
                                            <label class="control-label col-sm-2 col-md-2" for="name">Name</label>
                                            <div class="col-sm-10 col-md-10">
                                                <input type="text" class="form-control agent-form-control"
                                                       name="full_name" value="{!! old('full_name') !!}"
                                                       placeholder="Enter your full name" required/>
                                            </div>
                                        </div>
                                        <div class="row agent-field">
                                            <label class="control-label col-sm-2 col-md-2" for="email">Email</label>
                                            <div class="col-sm-10 col-md-10">
                                                <input type="email" class="form-control agent-form-control"
                                                       name="email_address" value="{!! old('email_address') !!}"
                                                       placeholder="Enter email address" required/>
                                            </div>
                                        </div>
                                        <div class="row agent-field">
                                            <label class="control-label col-sm-2 col-md-2" for="phone">Phone</label>
                                            <div class="col-sm-10 col-md-10">
                                                <input type="text" class="form-control agent-form-control"
                                                       name="phone_number" value="{!! old('phone_number') !!}"
                                                       placeholder="Enter phone number"/>
                                            </div>
                                        </div>
                                        <div class="row agent-field">
                                            <label class="control-label col-sm-2 col-md-2"
                                                   for="message">Message</label>
                                            <div class="col-sm-10 col-md-10">
                                                <textarea type="text" class="form-control agent-form-control"
                                                          name="message" rows="4" placeholder="Leave your message"
                                                          required>{!! old('message') !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="row agent-field">
                                            <label class="control-label col-sm-2 col-md-2"
                                                   for="ReCaptcha"></label>
                                            {!! NoCaptcha::renderJs() !!}
                                            {!! NoCaptcha::display() !!}
                                        </div>
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="property_id" value="{!! $property->id !!}"/>
                                        <button type="submit" class="btn btn-default agent-btn"><i
                                                    class="glyphicon glyphicon-send"></i>Submit
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('layouts.property-search-sidebar')

            <div class="col-sm-3 col-md-3 pull-right">
                @if($user)
                    <div class="row">
                        <div class="col-sm-12-md-12">
                            <div class="list-group">
                                <a href="#" class="list-group-item side-bar-head">Recently Saved Properties</a>
                                @foreach($savedProperties as $index=>$savedProperty)
                                    <a href="{!! route('properties.show', $savedProperty->slug) !!}"
                                       class="list-group-item">{!! $savedProperty->name !!}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-sm-12-md-12">
                        <div class="list-group">
                            <p class="list-group-item side-bar-head">Recently Added Properties</p>
                            @foreach($recentProperties as $index=>$recentProperty)
                                <a href="{!! route('properties.show', $recentProperty->slug) !!}"
                                   class="list-group-item">{!! $recentProperty->name !!}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            <!--Recently Viewed Properties-->
                <div class="row">
                    <div class="col-sm-12-md-12">
                        <div class="list-group">
                            <p class="list-group-item side-bar-head">Most Viewed Properties</p>
                            @foreach($popularProperties as $index=>$viewedProperty)
                                <a href="{!! route('properties.show', $viewedProperty->slug) !!}"
                                   class="list-group-item">{!! $viewedProperty->name !!}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!--Recently Searched Section-->
                <div class="row">
                    <div class="col-sm-12-md-12">
                        <div class="list-group">
                            <p class="list-group-item side-bar-head">Similar Properties</p>
                            @foreach($similarProperties as $index=>$similarProperty)
                                <a href="{!! route('properties.show', $similarProperty->slug) !!}"
                                   class="list-group-item">{!! $similarProperty->name !!}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal -->

@stop
