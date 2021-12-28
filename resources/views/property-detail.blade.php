@extends('layouts.app')

@section('title', $property->name)
@section('meta_keywords', $property->name)
@section('meta_description', $property->name)

@section('extra_meta')

<meta property="og:url" content="{!! route('properties.show', $property->slug) !!}" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $property->name }}" />
<meta property="og:description" content="{{ strip_tags($property->description) }}" />
<meta property="og:image" content="{!! url($property->getCoverImage()) !!}" />

@endsection

@section('header_css')
<style>
    #gmap_canvas img {
        max-width: none !important;
        background: none !important
    }

</style>
<link href="{{ asset('backend/plugins/sweetalert/dist/sweetalert2.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/plugins/formValidation/formValidation.min.css') }}" rel="stylesheet">
@endsection

@section('bodystart')
<div id="fb-root"></div>
<script>
    (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=911895265634736";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
</script>
@endsection

@section('footer_js')
<script src="{{ asset('backend/plugins/sweetalert/dist/sweetalert2.min.js') }}"></script>
<!-- formValidation -->
<script src="{{ asset('backend/plugins/formValidation/formValidation.min.js') }}"></script>
<script src="{{ asset('backend/plugins/formValidation/bootstrap.min.js') }}"></script>

<script src="http://maps.googleapis.com/maps/api/js?key={!! env('GOOGLE_MAP_KEY') !!}&secure=false"
    type="text/javascript"></script>
<script type="text/javascript">
    var propertyId = parseInt('{!! $property->id !!}');
        var latitude = '{!! $property->latitude !!}';
debugger;
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
            $('#inquiry-tab-link').on('click',function(e){
                $("li").removeClass("active");
                $("div").removeClass("in active");
                $(this).parent().addClass('active')
                $("#inquiry").addClass('in active')
            });
        });
</script>
@endsection

@section('dynamicdata')


<div class="property-details-page shared-page-top-padding">

    <div class="single-property">
        <div class="container">
            <div class="row custom-top-spacing single-gallery-row">
                <div class="col-lg-4">
                <span class="wdp-ribbon wdp-ribbon-six">
                        <span class="wdp-ribbon-inner-wrap">
                            <span class="wdp-ribbon-border"></span>
                                <span class="wdp-ribbon-text">
                                    @if($property->is_leased_sold=='Y' && $property->property_category_id=='1')
                                        SOLD
                                    @endif
                                    @if($property->is_leased_sold=='Y' && $property->property_category_id=='2')
                                        LEASED
                                    @endif
                                    @if($property->is_leased_sold=='N' && $property->property_category_id=='1')
                                    SALE
                                    @endif
                                    @if($property->is_leased_sold=='N' && $property->property_category_id=='2')
                                        RENT
                                    @endif
                                </span>
                            </span>
                        </span>
                    <div class="single-title-block">
                        <h1>{{$property->street_number.' '.$property->street.' '.$property->location_name ?? ""}}</h1>
                    </div>

                    <div class="badges">
                        <ul>
                            <li>
                                <span>{{$property->property_type_name ?? "--"}}</span>
                            </li>
                        </ul>
                    </div>

                    <div class="thumbnail">
                            <div class="thumbnail recent-properties-box">
                                <!--Caption Detail-->
                                <div class="caption detail">
                                    <header>
                                        <!--Area Block-->
                                        <div class="area-block">
                                            <!-- <div class="property-type">
                                                Property Type
                                                : {{$property->property_type_name ?? ""}}
                                            </div> -->
                                            <div class="property-area">
                                                {{$property->price_view ?? "Contact Agent"}}
                                                <div class="st-price"></div>
                                            </div>
                                        </div>
                                    </header>


                                    <!--Item Details-->
                                    <ul class="item-details">

                                        <li>
                                            <p class="item-bed">{{$property->number_of_bedrooms ?? 0}}
                                                Bed</p>
                                        </li>
                                        <li>
                                            <p class="item-bath">{{$property->number_of_bathrooms ?? 0}}
                                                Bath</p>
                                        </li>
                                        <li>
                                            <p class="item-garage">{{$property->number_of_garages ?? 0}}
                                                Garage</p>
                                        </li>

                                        <li>
                                            <p class="item-area">{{$property->area ?? '--'}} m<sup>2</sup>
                                                </p>
                                        </li>
                                    </ul>


                                    <div class="detail-footer">

                                        <a href="#agent-details-navigation"><i class="fa-eye"></i>
                                            {{ $property->view_count ?? 0 }}</a>
                                        <span><i class="fa-calendar-o"></i>{!! \Carbon\Carbon::parse($property->created_at)->diffForHumans() !!}</span>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <!-- end thumnail  -->
                        <div class="detail-print-container">
                            <ul class="nav detail-print">

                                <!-- <li><a href="https://multidynamicingleburn.com.au" class="btn btn-info detail-btn"><span
                                                class="glyphicon glyphicon-menu-left"></span>Back</a></li> -->


                                <li class="fb-share">
                                    <div class="fb-share-button fb_iframe_widget"
                                         data-href="https://multidynamicingleburn.com.au/properties/location-location-location-welcome-to-this-well-designed-modern-home"
                                         data-layout="button_count" data-size="large" data-mobile-iframe="true"
                                         fb-xfbml-state="rendered"
                                         fb-iframe-plugin-query="app_id=911895265634736&amp;container_width=60&amp;href=https%3A%2F%2Fmultidynamicingleburn.com.au%2Fproperties%2Flocation-location-location-welcome-to-this-well-designed-modern-home&amp;layout=button_count&amp;locale=en_US&amp;mobile_iframe=true&amp;sdk=joey&amp;size=large">
                                    <span style="vertical-align: bottom; width: 89px; height: 28px;"><iframe
                                                name="f3e18663cc988bc"
                                                data-testid="fb:share_button Facebook Social Plugin"
                                                title="fb:share_button Facebook Social Plugin" allowtransparency="true"
                                                allowfullscreen="true" scrolling="no" allow="encrypted-media"
                                                style="border: medium none; visibility: visible; width: 89px; height: 28px;"
                                                src="https://www.facebook.com/v2.10/plugins/share_button.php?app_id=911895265634736&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df26a287e52fcbe4%26domain%3Dmultidynamicingleburn.com.au%26is_canvas%3Dfalse%26origin%3Dhttps%253A%252F%252Fmultidynamicingleburn.com.au%252Ff27311465998866%26relation%3Dparent.parent&amp;container_width=60&amp;href=https%3A%2F%2Fmultidynamicingleburn.com.au%2Fproperties%2Flocation-location-location-welcome-to-this-well-designed-modern-home&amp;layout=button_count&amp;locale=en_US&amp;mobile_iframe=true&amp;sdk=joey&amp;size=large"
                                                class="" width="1000px" height="1000px" frameborder="0"></iframe></span>
                                    </div>
                                </li>
                                <!-- <li>
                                    <a class="btn btn-info detail-btn" id="inquiry-us-button"
                                       href="#has-inquiry-tab">Enquire
                                        Now</a>
                                </li> -->
                            </ul>
                        </div>
                        <!-- single title block  -->

                </div>
                <!-- end col  -->
                <div class="col-lg-8">
                    <div class="property-gallery">
                        <div id="carouselSliderIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators" style="display: none">
                                <?php

                                                        $propertyImages = $property->getImages();

                                                    ?>
                                @if($propertyImages->count() > 0)

                                @foreach($propertyImages as $index => $propertyImage)

                                <li data-target="#carouselSliderIndicators" data-slide-to="{{$index}}"
                                    class="{{ ($index == 0) ? 'active' : '' }}"></li>
                                @endforeach
                                @else

                                <li data-target="#carouselSliderIndicators" data-slide-to="0" class="active">
                                    <div class="image-preview-container">
                                        <img class="img-responsive" src="{{ url($defaultImage) }}" />
                                    </div>
                                </li>

                                @endif
                            </ol>
                            <div class="carousel-inner detail-carousel" role="listbox">

                                @if($propertyImages->count() > 0)

                                @foreach($propertyImages as $index => $propertyImage)
                                <div class="item {{ ($index == 0) ? 'active' : '' }}">
                                    <img class="d-block img-fluid"
                                        src="{{ url($propertyImage->getPropertyImagePath()) }}">
                                </div>
                                @endforeach
                                @else
                                <div class="item">
                                    <img class="d-block img-fluid" src="{{ url($defaultImage) }}">
                                </div>
                                @endif
                            </div>
                            <a class="left carousel-control" href="#carouselSliderIndicators" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carouselSliderIndicators" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row custom-top-spacing">

                <div class="col-lg-8">

                    <div class="description content-box">
                        <h2>{{$property->name ?? ""}}</h2>
                        <h4>{{$property->street_number.' '.$property->street.' '.$property->location_name ?? ""}}</h4>
                        <div class="preformater">
                            <div class="inner-wrap">
                                <pre>{!! $property->description ?? "" !!}</pre>
                            </div>

                            <div class="read-more">
                                <span>Read more</span>
                            </div>
                        </div>
                    </div>
                    <!-- end div content-box  -->

                    <div class="property-details content-box">
                        <h2>Property details</h2>
                            <div class="rows">
                                <ul class="row">
                                    <li class="col-lg-6">
                                        <label>Bedrooms:</label> {{$property->number_of_bathrooms ?? 0}}
                                    </li>
                                    <li class="col-lg-6">
                                        <label>Bathrooms:</label> {{$property->number_of_bedrooms ?? 0}}
                                    </li>
                                    <li class="col-lg-6">
                                        <label>Price:</label> {{$property->price_view ?? "Contact Agent"}}
                                    </li>
                                    <li class="col-lg-6">
                                        <label>Property Size:</label>{{$property->area ?? '--'}} m<sup>2</sup>
                                    </li>
                                </ul>
                        </div>
                    </div>
                    <!-- end div content-box  -->
                    @if(isset($property->airConditioning) || isset($property->openSpaces) ||
                    isset($property->livingAreas) ||
                    isset($property->carports) ||
                    isset($property->alarmSystem) ||
                    isset($property->builtInRobes) ||
                    isset($property->ensuite) ||
                    isset($property->furnished) ||
                    isset($property->intercom) ||
                    isset($property->openFirePlace) ||
                    isset($property->petFriendly) ||
                    isset($property->smokers) ||
                    isset($property->tennisCourt) ||
                    isset($property->vacuumSystem))
                    <div class="features-details content-box">
                        <h2>features</h2>
                        <ul class="row">
                            @if(isset($property->airConditioning) && $property->airConditioning > 0)
                                <li class="col-lg-4">Air Conditioning</li>
                            @endif
                            @if(isset($property->openSpaces) && $property->openSpaces > 0)
                                <li class="col-lg-4">Open Space</li>
                            @endif
                            @if(isset($property->livingAreas) && $property->livingAreas > 0)
                                <li class="col-lg-4">Living Area</li>
                            @endif
                            @if(isset($property->carports) && $property->carports > 0)
                                <li class="col-lg-4">Carports</li>
                            @endif
                            @if(isset($property->alarmSystem) && $property->alarmSystem > 0)
                                <li class="col-lg-4">Alarm System</li>
                            @endif
                            @if(isset($property->builtInRobes) && $property->builtInRobes > 0)
                                <li class="col-lg-4">Built in Robes</li>
                            @endif
                            @if(isset($property->ensuite) && $property->ensuite > 0)
                                <li class="col-lg-4">Ensuite</li>
                            @endif
                            @if(isset($property->furnished) && $property->furnished > 0)
                                <li class="col-lg-4">Furnished</li>
                            @endif
                            @if(isset($property->intercom) && $property->intercom > 0)
                                <li class="col-lg-4">Intercom</li>
                            @endif
                            @if(isset($property->openFirePlace) && $property->openFirePlace > 0)
                                <li class="col-lg-4">Open Fire Place</li>
                            @endif
                            @if(isset($property->petFriendly) && $property->petFriendly > 0)
                                <li class="col-lg-4">Pet Friendly</li>
                            @endif
                            @if(isset($property->smokers) && $property->smokers > 0)
                                <li class="col-lg-4">Smokers</li>
                            @endif
                            @if(isset($property->tennisCourt) && $property->tennisCourt > 0)
                                <li class="col-lg-4">Tennis Court</li>
                            @endif
                            @if(isset($property->vacuumSystem) && $property->vacuumSystem > 0)
                                <li class="col-lg-4">Vaccum System</li>
                            @endif
                        </ul>
                    </div>
                    @endif
                    <!-- end div content-box  -->
                    @if(isset($property->floor_plan_1) || isset($property->floor_plan_2) ||
                    isset($property->floor_plan_3))
                    <div class="floorplan content-box">
                        <h2>floor plan</h2>

                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            @if(isset($property->floor_plan_1))
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <button role="button" data-toggle="collapse" data-parent="#accordion"
                                            href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Floor 1
                                        </button>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                    aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div class="plan-image">
                                            <img src="{{$property->floor_plan_1}}" alt="">
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @endif
                            @if(isset($property->floor_plan_2))
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <button class="collapsed" role="button" data-toggle="collapse"
                                            data-parent="#accordion" href="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            Floor 2
                                        </button>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                                    aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <div class="plan-image">
                                            <img src="{{$property->floor_plan_2 ?? ""}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if(isset($property->floor_plan_3))
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                        <button class="collapsed" role="button" data-toggle="collapse"
                                            data-parent="#accordion" href="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            Floor 3
                                        </button>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                                    aria-labelledby="headingThree">
                                    <div class="panel-body">
                                        <div class="plan-image">
                                            <img src="{{$property->floor_plan_1 ?? null}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>

                    </div>
                    @endif
                    <!-- end div content-box  -->
                    @if(isset($property->video_link))
                    <div class="video content-box">
                        <h2>video</h2>
                        <div class="video__block">
                            <iframe width="100%" height="315" src="{{$property->video_link ?? null}}">
                            </iframe>
                            <a href="#" class="link"><i class="icon fa fa-play text-white"></i></a>
                        </div>
                    </div>
                    @endif
                    <!-- end div content-box  -->
                    @if(isset($property->inspection_1) || isset($property->inspection_2))
                    <div class="inspections content-box">
                        <h2>inspections</h2>
                        <div class="inspection-date">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            @if(isset($property->inspection_1))
                                            <td>{{$property->inspection_1 ?? null}}</td>
                                            @endif
                                            @if(isset($property->inspection_2))
                                            <td>{{$property->inspection_2 ?? null}}</td>
                                            @endif
                                            {{--<td><a href="#"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                                                    Add to calendar</a></td>--}}
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div>

                            <!-- Nav tabs -->
                            {{-- <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#primary" aria-controls="primary"
                                        role="tab" data-toggle="tab">Primary </a>
                                </li>
                                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab"
                                        data-toggle="tab">Secondary</a></li>
                                <li role="presentation"><a href="#child-care" aria-controls="child-care" role="tab"
                                        data-toggle="tab">Child Care</a></li>

                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="primary">
                                    <div class="content-wrapper">
                                        <div class="main-row">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    William Carey Christian School
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="row">
                                                        <div class="col-sm-4">Combined</div>
                                                        <div class="col-sm-4">Independent</div>
                                                        <div class="col-sm-4">42km</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end main row  -->

                                        <div class="main-row">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    William Carey Christian School
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="row">
                                                        <div class="col-sm-4">Combined</div>
                                                        <div class="col-sm-4">Independent</div>
                                                        <div class="col-sm-4">42km</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end main row  -->

                                        <div class="main-row">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    William Carey Christian School
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="row">
                                                        <div class="col-sm-4">Combined</div>
                                                        <div class="col-sm-4">Independent</div>
                                                        <div class="col-sm-4">42km</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end main row  -->

                                        <div class="main-row">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    William Carey Christian School
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="row">
                                                        <div class="col-sm-4">Combined</div>
                                                        <div class="col-sm-4">Independent</div>
                                                        <div class="col-sm-4">42km</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end main row  -->
                                        <div class="final-link">
                                            <button class="btn btn-default">"Distance" is a straight line
                                                calculation.
                                                See more about our child care and schools data.
                                            </button>
                                            <div class="final-collapse-content">We receive schools data from
                                                government
                                                agencies, schools, real estate agents and the general public.
                                                Childcare
                                                data is provided by KN Enrol Pty Ltd. We update our data from
                                                regular
                                                updates and feedback received. "Distance" refers to the straight
                                                line
                                                between the property and the school or child care address on our
                                                database. We recommend contacting schools and child cares
                                                directly
                                                regarding zoning and admissions.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="profile">
                                    <div class="content-wrapper">
                                        <div class="main-row">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    William Carey Christian School
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="row">
                                                        <div class="col-sm-4">Combined</div>
                                                        <div class="col-sm-4">Independent</div>
                                                        <div class="col-sm-4">42km</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end main row  -->

                                        <div class="main-row">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    William Carey Christian School
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="row">
                                                        <div class="col-sm-4">Combined</div>
                                                        <div class="col-sm-4">Independent</div>
                                                        <div class="col-sm-4">42km</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end main row  -->

                                        <div class="main-row">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    William Carey Christian School
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="row">
                                                        <div class="col-sm-4">Combined</div>
                                                        <div class="col-sm-4">Independent</div>
                                                        <div class="col-sm-4">42km</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end main row  -->

                                        <div class="main-row">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    William Carey Christian School
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="row">
                                                        <div class="col-sm-4">Combined</div>
                                                        <div class="col-sm-4">Independent</div>
                                                        <div class="col-sm-4">42km</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end main row  -->
                                        <div class="final-link">
                                            <button class="btn btn-default">"Distance" is a straight line
                                                calculation.
                                                See more about our child care and schools data.
                                            </button>
                                            <div class="final-collapse-content">We receive schools data from
                                                government
                                                agencies, schools, real estate agents and the general public.
                                                Childcare
                                                data is provided by KN Enrol Pty Ltd. We update our data from
                                                regular
                                                updates and feedback received. "Distance" refers to the straight
                                                line
                                                between the property and the school or child care address on our
                                                database. We recommend contacting schools and child cares
                                                directly
                                                regarding zoning and admissions.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="child-care">
                                    <div class="content-wrapper">
                                        <div class="main-row">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    William Carey Christian School
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="row">
                                                        <div class="col-sm-4">Combined</div>
                                                        <div class="col-sm-4">Independent</div>
                                                        <div class="col-sm-4">42km</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end main row  -->

                                        <div class="main-row">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    William Carey Christian School
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="row">
                                                        <div class="col-sm-4">Combined</div>
                                                        <div class="col-sm-4">Independent</div>
                                                        <div class="col-sm-4">42km</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end main row  -->

                                        <div class="main-row">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    William Carey Christian School
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="row">
                                                        <div class="col-sm-4">Combined</div>
                                                        <div class="col-sm-4">Independent</div>
                                                        <div class="col-sm-4">42km</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end main row  -->

                                        <div class="main-row">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    William Carey Christian School
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="row">
                                                        <div class="col-sm-4">Combined</div>
                                                        <div class="col-sm-4">Independent</div>
                                                        <div class="col-sm-4">42km</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end main row  -->
                                        <div class="final-link">
                                            <button class="btn btn-default">"Distance" is a straight line
                                                calculation.
                                                See more about our child care and schools data.
                                            </button>
                                            <div class="final-collapse-content">We receive schools data from
                                                government
                                                agencies, schools, real estate agents and the general public.
                                                Childcare
                                                data is provided by KN Enrol Pty Ltd. We update our data from
                                                regular
                                                updates and feedback received. "Distance" refers to the straight
                                                line
                                                between the property and the school or child care address on our
                                                database. We recommend contacting schools and child cares
                                                directly
                                                regarding zoning and admissions.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            --}}
                        </div>

                    </div>
                    @endif
                    <!-- end div content-box  -->
                    <div class="hidden-values">
                        <input type="hidden" name="property_title" value="{{ $property->name }}" />
                        <input type="hidden" name="location_name" value="{{ $property->location_name }}" />
                        <input type="hidden" name="latitude" value="{{ $property->latitude }}" />
                        <input type="hidden" name="longitude" value="{{ $property->longitude }}" />
                    </div>
                    <div class=" map-container">
                        <div class="content-box">
                            <h2>{{$property->name ?? ""}}</h2>
                            <div class="google_map">
                                <div id="gmap_canvas" style="height:400px;width:100%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col 8  -->
                <?php

                    $propertyAgents = $property->getPropertyAgents();

                    ?>

                @if($propertyAgents->count() > 0)
                <div class="col-lg-4 property_sidebar">
                <div class="agent-slider">
                    @foreach($propertyAgents as $index => $propertyAgent)
                    <div class="agent-wrapper">

                        <div class="agent-image">
                            <a class="agent-detail-link"
                                href="{!! route('agents.show', $propertyAgent->getCustomId()) !!}">
                                <img src="{{ url($propertyAgent->getAgentImagePath()) }}"
                                    alt=" {{ str_limit($propertyAgent->first_name . ' ' . $propertyAgent->last_name, 16) }}"
                                    class="img-responsive">
                            </a>
                        </div>

                        <div class="agent-text">
                            <h5 style="height: 27px;">
                                <a href="{!! route('agents.show', $propertyAgent->getCustomId()) !!}">
                                    {{ str_limit($propertyAgent->first_name . ' ' . $propertyAgent->last_name, 16) }}
                                </a>
                            </h5>

                            <div class="agent-short-contact">
                                <p>
                                    <a href="tel:{{$propertyAgent->phone_number ?? ""}}"><i
                                            class="glyphicon glyphicon-phone-alt"></i>{{ $propertyAgent->phone_number ??
                                        "" }}</a>
                                </p>

                                <p>
                                    <a href="tel:{{$propertyAgent->phone_number ?? ""}}"><i
                                            class="glyphicon glyphicon-phone"></i>{{$propertyAgent->phone_number ??
                                        ""}}</a>
                                </p>

                                <p>
                                    <a href="mailto:{{ $propertyAgent->email }}"><i
                                            class="glyphicon glyphicon-envelope"></i>{{str_limit($propertyAgent->email,
                                        15)}}...</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    </div>

                    <div class="form-wrapper">
                        <div class="list-group-item side-bar-head">Enquiry Now</div>
                        <div class="enquiry-now">
                                <form method="POST" action="https://multidynamic.com.au/send-enquiry-about-property-to-its-agents" accept-charset="UTF-8" id="enquiry-about-property-form"><input name="_token" type="hidden" value="Y3W7sI0PL3GWr01qMISURaPFqDxIzqfM2TpQJhNP">

                                <div class="row">

                                    <input type="hidden" name="property_id" value="959">

                                    <div class="form-group col-md-6 col-sm-6 col-12 left">
                                        <label>First Name</label>
                                        <input class="form-control agent-form-control" placeholder="First Name" name="first_name" type="text">

                                                                            </div>

                                    <div class="form-group col-md-6 col-sm-6 col-12 right">
                                        <label>Last Name</label>
                                        <input class="form-control agent-form-control" placeholder="Last Name" name="last_name" type="text">

                                                                            </div>

                                    <div class="form-group col-md-6 col-sm-6 col-12 left">
                                        <label>Email</label>
                                        <input class="form-control agent-form-control" placeholder="Email Address" name="email" type="text">

                                                                            </div>

                                    <div class="form-group col-md-6 col-sm-6 col-12 right">
                                        <label>Phone Number</label>
                                        <input class="form-control agent-form-control" placeholder="Phone Number" name="phone_number" type="text">

                                                                            </div>

                                    <div class="form-group col-md-12">
                                        <label>Message</label>
                                        <textarea class="form-control agent-form-control" placeholder="Message" rows="5" name="message" cols="50"></textarea>

                                                                            </div>

                                    <div class="form-group col-md-12">
                                        <label></label>
                                        <script src="https://www.google.com/recaptcha/api.js?" async="" defer=""></script>

                                        <div data-sitekey="6LeSEs4UAAAAAFqeb1xD2IiWrOQUQo-DUQQKMIj-" class="g-recaptcha"><div style="width: 304px; height: 78px;"><div><iframe title="reCAPTCHA" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LeSEs4UAAAAAFqeb1xD2IiWrOQUQo-DUQQKMIj-&amp;co=aHR0cHM6Ly9tdWx0aWR5bmFtaWMuY29tLmF1OjQ0Mw..&amp;hl=en&amp;v=VZKEDW9wslPbEc9RmzMqaOAP&amp;size=normal&amp;cb=53s0w21bn3kk" role="presentation" name="a-ogab2whag9tb" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation" width="304" height="78" frameborder="0"></iframe></div><textarea id="g-recaptcha-response-1" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea></div><iframe style="display: none;"></iframe></div>


                                                                            </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <button class="btn btn-primary pull-right submit-btn" type="submit">
                                            <i class="fa fa-paper-plane"></i>
                                            <span>Send</span>
                                        </button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>

                    <div class="list-group property-search-sidebar-container">
                        <div class="wrapper">
                            <p class="list-group-item side-bar-head property-search-sidebar-header">Search
                                Property</p>
                            <form action="{{route('properties.search')}}" method="get" class="form-group-lg">
                                <div class="col-md-12 slide-category">
                                    <select class="form-control type" name="category">
                                        <option value="">Select Property Category</option>
                                        @foreach(DataHelper::getCategories() as $key=>$category)
                                        <option value="{!! $category->name !!}">{!! $category->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 slider-loc">
                                    <input type="text" class="form-control ui-autocomplete-input" id="location"
                                        placeholder="Choose Location" autocomplete="off">
                                    <input type="hidden" id="location_id" name="location_id">
                                </div>
                                <div class="col-md-12">
                                    <select class="form-control property_type" name="property_type">
                                        <option value="">Select Property Type</option>
                                        @foreach(DataHelper::getPropertyTypes() as $key=>$type)
                                        <option value="{!! $type->id !!}">{!! $type->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <select class="form-control price_range" name="price_range">
                                        <option value="">Price Range</option>
                                        <option value="0-250000">Upto $250K</option>
                                        <option value="250000-500000">$250K-$500K</option>
                                        <option value="500000-650000">$500K-$650K</option>
                                        <option value="650000-750000">$650K-$750K</option>
                                        <option value="750000-1000000">$750K-$1M</option>
                                        <option value="1000000-100000000000">$1M Over</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <select class="form-control type" name="number_of_bedrooms">
                                        <option value="" selected="selected">Beds</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4+</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <select class="form-control type" name="number_of_bathrooms">
                                        <option value="" selected="selected">Baths</option>

                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="1">1.5</option>
                                        <option value="2">2</option>
                                        <option value="1">2.5</option>
                                        <option value="3">3+</option>

                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <select class="form-control type" name="number_of_garages">
                                        <option value="" selected="selected">Garage</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3+</option>
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <button class="btn btn-primary">Search</button>
                                </div>

                            </form>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!-- end list group  -->

                    <div class="list-group">
                        <p class="list-group-item side-bar-head">Recently Added Properties</p>
                        @foreach($recentProperties as $index=>$recentProperty)
                        <a href="{!! route('properties.show', $recentProperty->slug) !!}" class="list-group-item">{!!
                            $recentProperty->name !!}</a>
                        @endforeach

                    </div>

                    <div class="list-group">
                        <p class="list-group-item side-bar-head">Most Viewed Properties</p>
                        @foreach($popularProperties as $index=>$viewedProperty)
                        <a href="{!! route('properties.show', $viewedProperty->slug) !!}" class="list-group-item">{!!
                            $viewedProperty->name !!}</a>
                        @endforeach
                    </div>


                    <div class="list-group">
                        <p class="list-group-item side-bar-head">Similar Properties</p>

                        @foreach($similarProperties as $index=>$similarProperty)
                        <a href="{!! route('properties.show', $similarProperty->slug) !!}" class="list-group-item">{!!
                            $similarProperty->name !!}</a>
                        @endforeach

                    </div>

                </div>
                <!-- end col 9  -->
            </div>
        </div>
    </div>
</div>

@stop