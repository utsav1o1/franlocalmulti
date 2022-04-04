@extends('layouts.app')
@section('title', 'Property Management')
@section('meta_keywords', env('APP_NAME'))
@section('meta_description', env('APP_NAME'))
@section('dynamicdata')

<!-- selling banner  -->
@if(!empty($page))


<div class="banner banner--selling" style="background-image: url('{{ url($page->getImagePath()) }}')">
    <div class="container">
        <div class="banner__caption">
            <h1><span>Thinking about</span>Selling Your Home?</h1>
            <div class="list-property white-bg">{{$page->sub_heading}}</div>
            <h2>{!! $page->short_description !!}</h2>
            <a href="#property-appraisal">click here</a>
        </div>
    </div>
</div>
<!-- end selling banner  -->

<div class="prpoerty__appraisal">
    <div class="prpoerty__appraisal__bg"></div>
    <div class="container">
        <div class="prpoerty__appraisal__wrapper" id="property-appraisal">
            <h2>GET YOUR FREE PROPERTY APPRAISAL<span>Kindly enter your details below</span></h2>
            <form method="POST" id="propertyAppraisalForm">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input class="form-control" type="text" name="name" id="" placeholder="Enter your full name"
                                value="{{old('name')}}">
                            {{-- @if($errors->has('name'))
                            <span class="error">{{ $errors->first('name') }}</span>
                            @endif --}}
                            <span class='text-danger error name'
                                style='display:none;font-size:11px;color:white;'></span>
                        </div>
                    </div>
                    <!-- end col  -->
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input class="form-control" type="email" name="email" id="" placeholder="Enter your email"
                                value="{{old('email')}}">
                            {{-- @if($errors->has('email'))
                            <span class="error">{{ $errors->first('email') }}</span>
                            @endif --}}
                            <span class='text-danger error email'
                                style='display:none;font-size:11px;color:white;'></span>
                        </div>
                    </div>
                    <!-- end col  -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input class="form-control" type="number" name="phone" id=""
                                placeholder="Enter your phone number" value="{{old('phone')}}">
                            {{-- @if($errors->has('phone'))
                            <span class="error">{{ $errors->first('phone') }}</span>
                            @endif --}}
                            <span class='text-danger error phone'
                                style='display:none;font-size:11px;color:white;'></span>
                        </div>
                    </div>
                    <!-- end col  -->

                    <div class="col-lg-6">
                        <div class="form-group">
                            <input class="form-control" type="text" name="postal_code" id="" placeholder="Post code"
                                value="{{old('postal_code')}}">
                            {{-- @if($errors->has('postal_code'))
                            <span class="error">{{ $errors->first('postal_code') }}</span>
                            @endif --}}
                            <span class='text-danger error postal_code'
                                style='display:none;font-size:11px;color:white;'></span>
                        </div>
                    </div>
                    <!-- end col  -->
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="text" name="property_address" id="" placeholder="Enter your property address"
                                class="form-control" value ="{{old('property_address')}}">
                            {{-- @if($errors->has('property_address'))
                            <span class="error">{{ $errors->first('property_address') }}</span>
                            @endif --}}
                            <span class='text-danger error property_address'
                                style='display:none;font-size:11px;color:white;'></span>
                        </div>
                    </div>
                    <!-- end col  -->
                    <div class="col-lg-12">
                        <div class="form-group">
                            <textarea name="message" class="form-control" placeholder="Tell us more!"
                                value="{{old('message')}}"></textarea>
                            {{-- @if($errors->has('message'))
                            <span class="error">{{ $errors->first('message') }}</span>
                            @endif --}}
                            <span class='text-danger error message'
                                style='display:none;font-size:11px;color:white;'></span>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            {!! Honeypot::generate('my_name', 'my_time') !!}
                            {{-- @if($errors->has('my_name'))
                            <span class="error">{{ $errors->first('my_name') }}</span>
                            @endif --}}
                            <span class='text-danger error my_time'
                                style='display:none;font-size:11px;color:white;'></span>
                        </div>
                    </div>
                    <!-- end col  -->
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
                        <div class="form-group">
                            <button class="btn btn--primary sendPropertyAppraisal">submit enquiry</button>
                        </div>
                    </div>
                    <!-- end col  -->
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end section  -->
<div class="award-section">
    <div class="award-section__bg"></div>
    <div class="container">
        <div class="award-logos">
            <img src="images/award-logos.png" alt="">
        </div>
        <div class="award-title">
            <h2>Our award winning team are here for you</h2>
        </div>
        <div class="award-listitem">
            <ul>
                <li>Dedicated</li>
                <li>Knowledgeable</li>
                <li>Trustworthy</li>
                <li>Passionate</li>
            </ul>
        </div>
        <div class="award-teams">
            <img src="images/award-teams.png" alt="">
        </div>
    </div>
</div>
<!-- award section  -->
<!--end  award section  -->

<div class="free-guides white-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="first-content-block">
                    <h3>We offer <strong>FREE</strong> <br>
                        Buyers and Sellers Guides
                    </h3>
                    <p>Buying or selling your property doesn’t have to be a stressful experience. Multi Dynamic have
                        prepared these FREE guides to help make the process plain sailing. Packed with tips and tricks
                        and need to know information, this is your go-to guide for property transactions.
                    </p>
                    <h4>Download yours today!</h4>
                </div>
            </div>
            @if(!empty($page->selling))
            <div class="col-lg-4">
                <div class="free-guides-block">
                    <img src="images/MD---Seller-Guide.png" alt="">
                    <h3>{{$page->selling->meta_key}}?</h3>
                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#sellingModal">Download
                        Seller’s Guide</a>
                </div>
            </div>
            @endif
            @if(!empty($page->buying))
            <div class="col-lg-4">
                <div class="free-guides-block">
                    <img src="images/MD---Seller-Guide.png" alt="">
                    <h3>{{$page->buying->meta_key}}?</h3>
                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#buyingModal">Download
                        Buyer’s Guide</a>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endif
@stop