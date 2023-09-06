@extends('layouts.app')
@section('title', 'Property Management')
@section('meta_keywords', env('APP_NAME'))
@section('meta_description', env('APP_NAME'))
@section('dynamicdata')


@if(!empty($page))
    <!--Start of Body Part-->
    <!--START OF SLIDER PART-->
    <div class="zero-dollars zero-dollars-selling" style="background: url('{{ url($page->getImagePath()) }}')">
        <div class="container">
            <div class="zero-dollars--capton">
                <b>Thinking about</b>
                <h2>Selling Your Home?<span>{{$page->sub_heading}}</span></h2>
            <div class="list-icon-type">
                <ul>
                    <li>Free Property Appraisal</li>
                    <li>Pay Zero Dollar Upfront</li>
                </ul>
            </div>
                <div class="button-wrapper">
                    <a href="#property-evaluation">Click here</a>
                </div>
            </div>
        </div>
    </div>


    <!-- end section  -->
    <div class="md-selling-text-block">
        <div class="container">
            <div class="inner-wrapper text-center">
                <p>Customer service, innovation, and a team of local experts. These are the cornerstones that
                    distinguish Multi Dynamics’ award-winning agency from the competition. We provide best-in-class processes from end to end.</p>
                <p>What does that mean for you? Your property sells faster, for the best price, and with minimal stress
                    to you.</p>
                <p class="orange">We have just been nominated as “New South Wales Agency of the Year” for 2022 by
                    RateMyAgent. Proof that once again, we are market leaders in New South Wales real estate.</p>
                <p>We trust it will make another fine addition to the Multi Dynamic trophy cabinet.</p>
            </div>
        </div>
    </div>

    <div class="proverty-value-reaveled text-center" style="background: url(images/property-value-banner.jpg) no-repeat center;">
        <div class="container">
            <div class="heading">
                <h2>YOUR PROPERTY VALUE</h2>
                <h3>REVEALED IN<span>4 MINUTES</span></h3>
            </div>
            <div class="teams">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="teams__block">
                            <div class="image">
                                    <img src="https://multidynamic.com.au/uploads/agent-images/agent-image-MDI6MDM6NTA4.jpg" alt="Bijay Gyawali">
                                </div>
                                <div class="caption">
                                    Bijay Gyawali
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="teams__block">
                            <div class="image">
                                <img src="https://multidynamic.com.au/uploads/agent-images/agent-image-MDI6MDM6NTY3Ng==.jpg" alt="Dilli Dhakal">
                            </div>
                            <div class="caption">
                                Dilli Dhakal
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="teams__block">
                            <div class="image">
                                <img src="https://www.multidynamic.com.au/uploads/agent-images/agent-image-MDI6MDU6NTIyOQ==.jpg" alt="Jeetendra Shrestha">
                            </div>
                            <div class="caption">
                                Jeetendra Shrestha
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-desc">
                <span>TEXT YOUR ADDRESS TO </span>
                <div class="phone">
                    <a href="">0430 966 240</a>
                </div>
                <div class="email">
                    <a href="">www.multidynamicauburn.com.au</a>
                </div>
            </div>
        </div>
    </div>


    <div class="property-evaluation-block selling-property-evaluation">
        <div class="mdselling-appraisal-banner" style="background: url('images/mdselling-appraisal-baner.jpg');"></div>
        <div class="container">
            <div class="property-evaluation-wrapper" id="property-evaluation">
                <h2>GET YOUR FREE PROPERTY APPRAISAL</h2>
                <p>Kindly enter your details below</p>
                <form method="POST" id="propertyAppraisalForm">
                {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="text" name="name" id="" placeholder="Enter your full name"
                                    class="form-control" value="{{old('name')}}">
                            {{-- @if($errors->has('name'))
                            <span class="error">{{ $errors->first('name') }}</span>
                            @endif --}}
                            <span class='text-danger error name'
                                style='display:none;font-size:11px;color:white;'></span>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="email" name="email" id="" placeholder="Enter your email"
                                    class="form-control" value="{{old('email')}}">
                            {{-- @if($errors->has('email'))
                            <span class="error">{{ $errors->first('email') }}</span>
                            @endif --}}
                            <span class='text-danger error email'
                                style='display:none;font-size:11px;color:white;'></span>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="number" name="phone" id="" placeholder="Enter your phone nmber"
                                    class="form-control" value="{{old('phone')}}">
                            {{-- @if($errors->has('phone'))
                            <span class="error">{{ $errors->first('phone') }}</span>
                            @endif --}}
                            <span class='text-danger error phone'
                                style='display:none;font-size:11px;color:white;'></span>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="postal_code" id="" placeholder="Post code"
                                    class="form-control" value="{{old('postal_code')}}">
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
                        <div class="col-lg-12">
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="" cols="30" rows="10"
                                    placeholder="Tell us more!" value="{{old('message')}}"></textarea>
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
                            <button class="btn btn-warning sendPropertyAppraisal">Submit Enquiry</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end property evaluation block  -->
    <div class="award-winning-team text-center">
        <div class="award-winning-team-banner"></div>
        <div class="container">
            <div class="award-logo">
                <img src="images/selling-awards.png" alt="">
            </div>
            <div class="team-title">
                <h2>Our award winning team are here for you</h2>
            </div>
            <div class="award-listing">
                <ul>
                    <li>Dedicated</li>
                    <li>Knowledgeable</li>
                    <li>Trustworthy</li>
                    <li>Passionate</li>
                </ul>
            </div>
            <div class="group-team">
                
            </div>
        </div>
    </div>

    <div class="free-guides free-guides-nobg">
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
                        <img src="images/MD---buyers-Guide.png" alt="">
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
