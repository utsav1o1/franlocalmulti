@extends('layouts.app')
@section('title', 'Home')
@section('meta_keywords', config('static_data.real-estate-agent.'. $home->page .'.meta_keywords'))
@section('meta_description', config('static_data.real-estate-agent.'. $home->page .'.meta_description'))
@section('dynamicdata')
    <!--Start of Body Part-->

<!--START OF SLIDER PART-->
<div class="casual--banner" style="background: url('{{ url($home->banner->getFilePath()) }}')">
    <div class="container">
        <div class="award-logo">
            <img src="images/selling-awards.png" alt="">
        </div>
        <div class="banner-caption">
            {!! $home->banner->meta_value !!}
        </div>
    </div>
</div>


<!-- end banner section  -->

<div class="casula__area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="content-left">
                {!! $home->content->meta_value !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="content-right">
                @if(optional($home->content)->image)
                    <img src="{{ url($home->content->getFilePath()) }}" alt="">
                @endif
                </div>
            </div>
        </div>
        <div class="read-more-block text-center">
            <span id="read-more">Click here to read more</span>
        </div>

        <div class="read-more-content">
            @if($home->read_more_img)
                <img src="{{ url($home->read_more_img->getFilePath()) }}" alt="" loading="lazy">
            @endif
            <div class="content-list-block">
            @foreach($home->hidden_content as $content)
                {!! $content->meta_value !!}
            @endforeach
            </div>
            <!-- end  -->
        </div>

        <div class="read-less-block text-center">
            <span id="read-less">Click here to read less</span>
        </div>
    </div>
</div>
        
<div class="property-evaluation-block property-evaluation-block__casual"
        style="background: url(images/property-evaluation-block-casual-banner.jpg);">>
    <div class="container">
        <div class="property-evaluation-wrapper" id="property-evaluation">
            <h2>Free Property Evaluation!</h2>
            <p>We’ll send you a comprehensive, personalised report with in-depth analysis and market insights from
                Multi Dynamic</p>
            <form method="POST" id="propertyEvaluationForm">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <input type="text" name="name" id="" placeholder="Enter your name" class="form-control">
                            {{-- @if($errors->has('name'))
                            <span class="error">{{ $errors->first('name') }}</span>
                            @endif --}}
                            <span class='text-danger error name'
                                style='display:none;font-size:11px;color:white;'></span>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <input type="email" name="email" id="" placeholder="Enter your email" class="form-control">
                            {{-- @if($errors->has('email'))
                            <span class="error">{{ $errors->first('email') }}</span>
                            @endif --}}
                            <span class='text-danger error email'
                                style='display:none;font-size:11px;color:white;'></span>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <input type="number" name="phone" id="" placeholder="Enter your phone" class="form-control">
                            {{-- @if($errors->has('phone'))
                            <span class="error">{{ $errors->first('phone') }}</span>
                            @endif --}}
                            <span class='text-danger error phone'
                                style='display:none;font-size:11px;color:white;'></span>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <input type="number" name="postal_code" id="" placeholder="Enter your postal code"
                                class="form-control">
                            {{-- @if($errors->has('postal_code'))
                            <span class="error">{{ $errors->first('postal_code') }}</span>
                            @endif --}}
                            <span class='text-danger error postal_code'
                                style='display:none;font-size:11px;color:white;'></span>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="text" name="property_address" id="" placeholder="Enter your property address"
                                class="form-control">
                            {{-- @if($errors->has('property_address'))
                            <span class="error">{{ $errors->first('property_address') }}</span>
                            @endif --}}
                            <span class='text-danger error property_address'
                                style='display:none;font-size:11px;color:white;'></span>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            {!! Honeypot::generate('my_name', 'my_time') !!}
                            {{-- @if($errors->has('my_name'))
                            <span class="error">{{ $errors->first('my_name') }}</span>
                            @endif --}}
                            <span class='text-danger error my_name'
                                style='display:none;font-size:11px;color:white;'></span>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="control-label col-sm-2 col-md-2" for="ReCaptcha"></label>
                        {!! NoCaptcha::renderJs() !!}
                        {!! NoCaptcha::display() !!}

                        {{-- @if($errors->has('g-recaptcha-response'))
                        <small class="validation-error-message">{{ $errors->get('g-recaptcha-response')[0] }}</small>
                        @endif --}}
                        <span class='text-danger error g-recaptcha-response'
                            style='display:none;font-size:11px;color:white;'></span>
                    </div>
                    <div class="col-lg-12">
                        <button class="btn btn-warning sendPropertyEvaluation" type="button">submit</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<!-- end property evaluation block  -->

<div class="free-guides free-guides__casual">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="first-content-block">
                    <h3>We offer <strong>FREE</strong> <br>
                        Buyers and Sellers Guides
                    </h3>
                    <p>Buying or selling your property doesn’t have to be a stressful experience. Multi Dynamic have
                        prepared these FREE guides to help make the process plain sailing. Packed with tips and
                        tricks
                        and need to know information, this is your go-to guide for property transactions.
                    </p>
                    <h4>Download yours today!</h4>
                </div>
            </div>
            @if(!empty($home->selling))
        <div class="col-lg-4">
            <div class="free-guides-block">
                <img src="images/MD---Seller-Guide.png" alt="">
                <h3>{{$home->selling->meta_key}}?</h3>
                <a href="{{ url($home->selling->getFilePath()) }}" class="btn btn-warning" data-toggle="modal"
                    data-target="#sellingModal">Download
                    Seller’s Guide</a>
            </div>
        </div>
        @endif
        @if(!empty($home->buying))
        <div class="col-lg-4">
            <div class="free-guides-block">
                <img src="images/MD---Seller-Guide.png" alt="">
                <h3>{{$home->buying->meta_key}}?</h3>
                <a href="{{ url($home->buying->getFilePath()) }}" class="btn btn-warning" data-toggle="modal"
                    data-target="#buyingModal">Download
                    Buyer’s Guide</a>
            </div>
        </div>
        @endif
        </div>
    </div>
</div>
<!-- end free guides  -->
@isset($testimonials)
    @if($testimonials->count()>0)
    <div class="testimonial">
        <div class="container">
            <div class="main-title">
                <h2>Testimonials</h2>
                <p>Find out what people are really saying about Multi Dynamic</p>
            </div>
            <div class="testimonial__slider">
                @foreach ($testimonials as $testimonial)


                <div class="slider-item">
                    <div class="content-wrapper">
                        <div class="testimonial-image">
                            <img src="{{ url($testimonial->getImagePath()) }}" alt="">
                        </div>
                        <div class="title">
                            <h3>{{$testimonial->title}}</h3>
                        </div>
                        <div class="content">
                            {!!$testimonial->description!!}
                        </div>

                        <div class="author">
                            {{$testimonial->name}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
@endisset


@isset($agents)
@if($agents->count()>0)

<div class="team">
<div class="container">
    <h2>Meet The Team</h2>
    <div class="team__slider">
        @foreach ($agents as $agent)
        <div class="team__slider__item">
            <div class="team__block">
                <div class="team__image">
                    <img src="{{$agent->getAgentImagePath()}}" alt="team">
                </div>
                <div class="team__content">
                    <h3>{{ $agent->getFullName() }}<em>{!! $agent->designation ? $agent->designation->designation :
                            '' !!}</em></h3>
                </div>
                <div class="team-links">
                    <ul>
                        <li><a href="tel:{{$agent->phone_number}}"><img src="{{asset('')}}images/telephone.png"
                                    alt=""></a></li>
                        <li><a href="tel:{{$agent->mobile_number}}"><img src="{{asset('')}}images/mobile.png"
                                    alt=""></a></li>
                        <li><a href="mailto:{{$agent->email}}"><img src="{{asset('')}}images/message.png"
                                    alt=""></a></li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
        <!-- end item  -->

    </div>
</div>
</div>
@endif
@endisset
<div class="instagram">
<div class="container">
    <h2>Follow our instagram <a href="https://www.instagram.com/multidynamic.ingleburn/"
            target="_blank">@multidynamic.ingleburn</a></h2>
    @if(!empty($posts))
    <div class="insta-gallery">
        <ul>
            @foreach($posts as $insta_post)
            <li class="insta-gallery-block">
                <div class="image">
                    <a href="javascript:void(0)"><img src="{{asset('insta/images/'.$insta_post)}}" alt=""
                            target="_blank"></a>
                </div>
                {{-- <div class="insta-share">--}}
                    {{-- <ul>--}}
                        {{-- <li>--}}
                            {{-- <a href="#">--}}
                                {{-- <i class="fa fa-heart" aria-hidden="true"></i>--}}
                                {{-- <span class="count">20</span>--}}
                                {{-- </a>--}}
                            {{-- </li>--}}
                        {{-- <li>--}}
                            {{-- <a href="#">--}}
                                {{-- <i class="fa fa-comment" aria-hidden="true"></i>--}}
                                {{-- <span class="count">0</span>--}}
                                {{-- </a>--}}
                            {{-- </li>--}}
                        {{-- </ul>--}}
                    {{-- </div>--}}
            </li>
            @endforeach
            <!-- end block  -->

        </ul>
        <div class="text-center follow-us-btn">
            <a href="https://www.instagram.com/multidynamic.ingleburn/" target="_blank"
                class="btn btn-primary">Follow Us</a>
        </div>
    </div>
    @endif
</div>
</div>

<!-- end instagram  -->
@endsection
