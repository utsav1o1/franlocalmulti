@extends('layouts.app')

@section('title', 'Home Page')
@section('meta_keywords', env('APP_NAME'))
@section('meta_description', env('APP_NAME'))

@section('header_css')

    <style>

        .finalist-image {
            position: relative;
        }

        .finalist-image img {
            position: absolute;
            z-index: 1;
            width: 130px;
            height: auto;
            top: 20px;
            left: 20px;
        }

        .finalist-image.down {
            visibility: hidden;
        }

        @media only screen and (max-width: 620px) {

            .finalist-image {
                visibility: hidden;
            }

            .finalist-image.down {
                visibility: visible;
            }

            .finalist-image.down img {
                top: -55px;
            }


            .slider-form-wrapper {
                margin-top: 70px;
            }

            .slider-form-wrapper .slider-form-bg {
                padding-top: 70px;
            }
        }

    </style>

@endsection

@section('footer_js')
    <script type="text/javascript">
        $(document).ready(function() {

            $('#send').on('click', function (e) {

                e.preventDefault();
                var name = $('#name').val();
                var email = $('#email').val();
                var mobile = $('#mobile').val();
                var subject = $('#subject').val();
                var message = $('#message').val();
                var url = window.location.href + 'send';


                $.ajax({
                    type: "GET",
                    url: url,
                    data: {'name' : name, 'email' : email, 'mobile' : mobile, 'subject' : subject, 'message' : message},
                    success: function( res ) {
                        $("#sendResponse").append("<div>Message sent sucessfully...</div>");
                    }
                });
            });
        });
    </script>
@endsection

@section('dynamicdata')

    <div class="finalist-image container">
        <img src="{{ env('CORPORATE_URL') . '/assets/images/finalist-image.png' }}"/>
    </div>

    @include('layouts.slider')

    {{--<div id="myModal" class="modal fade" role="dialog">--}}
        {{--<div class="modal-dialog">--}}

            {{--<!-- Modal content-->--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                    {{--<h4 class="modal-title">First Home Buyer Property Information</h4>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--<p>Please, provide the required information below</p>--}}

                    {{--<form id="sendForm" action="#">--}}
                        {{--<div class="form-group">--}}
                            {{--<input type="text" class="form-control" id="name" name="name" placeholder="Name" required>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<input type="text" class="form-control" id="email" name="email" placeholder="Email" required>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" required>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<textarea class="form-control" type="textarea" id="message" placeholder="Message" maxlength="140" rows="7"></textarea>--}}

                        {{--</div>--}}
                        {{--<div id="sendResponse"></div>--}}
                {{--</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--<button type="button" type="submit" class="btn btn-default" id="send">Send</button>--}}
                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</div>--}}

    {{--<div class="row event-scroll">--}}
        {{--<div class="container">--}}
            {{--<marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">  <span class="upcoming-event">Upcoming events:</span><font color="blue"> First Home Buyer Property Information </font> May 18th Friday in Sydney Time: 5:30 pm - 7:30 pm, Venue: Third Eye Rooftop Restaurant, 370 Princes Highway Banksia--}}
                {{--<span class="eventfocus">Only for 40 people. Please reserve your seat ASAP.</span>--}}
                {{--<a href="mailto:sales@multidynamic.com.au" id="join-now" class="join-now" data-toggle="modal" data-target="#myModal">Join Now !</a>--}}

            {{--</marquee>--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="container">
     <div class="row">

        <div class="col-12 text-center main-title" style="font-size:14px">
            <h1>Welcome to Multi Dynamic Ingleburn</h1>
            <p>

               Multi Dynamic Real Estate is one of the trusted and fasted growing real estate in Australia. Our dedicated, educated and hardworking Ingleburn team has proven to serve and prioritise our customers to buy, sell, rent and build their properties.

               You can be assured when you get into Multi Dynamic Ingleburn, you will find every solution to your real estate needs.

               We believe the client's satisfaction is the key for our business success.


            </p>
        </div>

    </div>
    </div>

    <!--START OF BODY PART-->
    <div class="row">
        <div class="middle-wrapper">
            <div class="container">
                <div class="main-title">
                    <h1>FEATURED PROPERTIES</h1>
                    <div class="border">
                        <div class="border-inner"></div>
                    </div>
                    <font color="#0c5aa0">
                        <!--<p>Having served many clients in the past, team has got together to open their own brand new office
                            to give even better, reliable and extra ordinary service to their prospective clients.</p>-->
                    </font>
                </div>
                @foreach($properties as $property)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="thumbnail">
                            <div class="thumbnail recent-properties-box">
                                <a class="thumbnail-container" href="{!! route('properties.show', $property->slug) !!}">

                                        <img src="{!! url($property->getCoverImage()) !!}"
                                             alt="{!! $property->name !!}"
                                             class="img-responsive"/>
                                </a>
                                @if($property->contractType)
                                    <span class="properties__ribon">{!! $property->contractType->heading !!}</span>
                            @endif
                            <!--Caption Detail-->
                            <div class="caption detail">
                                <header>
                                    <div class="pull-left">
                                        <h1 class="title">
                                            <a href="{!! route('properties.show', $property->slug) !!}">{!! str_limit($property->name, 30) !!}</a>
                                        </h1>
                                    </div>
                                    {{--<div class="price">${!! $property->price !!}</div>--}}
                                    <div class="price-block">
                                        <div class="starting-price">{!! $property->price_type_name !!}</div>
                                        <div class="price">{{ $property->getFormattedPrice() }}</div>
                                    </div>
                                    <!--Area Block-->
                                    <div class="area-block">
                                        <div class="property-type">Property Type</div>
                                        <div class="property-area">{!! $property->property_type_name !!}</div>
                                    </div>
                                </header>
                                <!--Location-->
                                <h3 class="location">
                                    @if($property->location)
                                        <a href="#">
                                            <i class="fa fa-map-marker"></i>{!! $property->location_name !!}
                                        </a>
                                    @endif
                                </h3>
                                <!--Item Details-->
                                <ul class="item-details col-md-12">
                                    <li>
                                        <p class="item-area">@if($property->area > 0) {!! $property->area !!} m<sup>2</sup>@else --.-- @endif</p>
                                    </li>

                                    <li>
                                        <p class="item-bed">{!! $property->number_of_bedrooms !!} Bedroom</p>
                                    </li>
                                    <li>
                                        <p class="item-bath">{!! $property->number_of_bathrooms !!} Bathroom</p>
                                    </li>
                                    <li>
                                        <p class="item-garage">{!! $property->number_of_garages !!} Garage</p>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                                <div class="detail-footer">
                                    <a href="{!! route('properties.show', $property->slug) !!}"><i class="fa-user"></i> {{ $property->agents_count }} {{ ($property->agents_count < 2) ? 'agent' : 'agents' }}</a>
                                    <span><i class="fa-calendar-o"></i>{!! App\Http\Helper::time_elapsed_string($property->created_at) !!}</span>
                                </div>

                            </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="">
        <div class="middle-wrapper">
            <div class="container">
                <div class="main-title">
                    <h1>BLOGS</h1>
                    <div class="border">
                        <div class="border-inner"></div>
                    </div>
                </div>

                <div class="blogs-links-container">

                    @foreach($blogs as $blog)

                        <a href="{{ route('page.blog', ['slug' => $blog->slug]) }}" class="col-md-6">
                            <div class="blog-link">
                                <div class="col-md-5 blog-link-image-container">
                                    <img src="{{ url($blog->getBlogImagePath()) }}"/>
                                </div>
                                <div class="col-md-7 blog-short-details-container">
                                    <div class="blog-link-heading">{{ $blog->title }}</div>
                                    <div class="blog-short-descriptions">{{ str_limit($blog->description, 120) }}</div>
                                    <div class="row blog-other-attributes">
                                        <div class="col-md-6 posted-by-container">
                                            <i class="fa fa-user"></i> <span class="posted-by">{{ $blog->creator }}</span>
                                        </div>
                                        <div class="col-md-6 posted-date-container">
                                            <i class="fa fa-calendar"></i> <span class="posted-date">{{ $blog->getCreatedDate() }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
@stop
