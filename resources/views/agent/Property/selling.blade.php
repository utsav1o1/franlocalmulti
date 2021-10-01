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
            <a href="#">click here</a>
        </div>
    </div>
</div>
<!-- end selling banner  -->

<div class="prpoerty__appraisal">
    <div class="prpoerty__appraisal__bg"></div>
    <div class="container">
        <div class="prpoerty__appraisal__wrapper">
            <h2>GET YOUR FREE PROPERTY APPRAISAL<span>Kindly enter your details below</span></h2>
            <form action="{{route('propertyappraisal')}}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input class="form-control" type="text" name="name" id="" placeholder="Enter your full name"
                                value="{{old('name')}}">
                            @if($errors->has('name'))
                            <span class="error">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <!-- end col  -->
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input class="form-control" type="email" name="email" id="" placeholder="Enter your email"
                                value="{{old('email')}}">
                            @if($errors->has('email'))
                            <span class="error">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <!-- end col  -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input class="form-control" type="number" name="phone" id=""
                                placeholder="Enter your phone number" value="{{old('phone')}}">
                            @if($errors->has('phone'))
                            <span class="error">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                    </div>
                    <!-- end col  -->

                    <div class="col-lg-6">
                        <div class="form-group">
                            <input class="form-control" type="text" name="postal_code" id="" placeholder="Post code"
                                value="{{old('postal_code')}}">
                            @if($errors->has('postal_code'))
                            <span class="error">{{ $errors->first('postal_code') }}</span>
                            @endif
                        </div>
                    </div>
                    <!-- end col  -->
                    <div class="col-lg-12">
                        <div class="form-group">
                            <select name="property_type" id="" class="form-control wide"
                                value="{{old('property_type')}}">
                                <option value="" disabled selected>Are you looking to...</option>
                                <option value="1">House</option>
                                <option value="2">Land</option>
                                <option value="3">Building</option>
                            </select>
                            @if($errors->has('property_type'))
                            <span class="error">{{ $errors->first('property_type') }}</span>
                            @endif
                        </div>
                    </div>
                    <!-- end col  -->
                    <div class="col-lg-12">
                        <div class="form-group">
                            <textarea name="message" class="form-control" placeholder="Tell us more!"
                                value="{{old('message')}}"></textarea>
                            @if($errors->has('message'))
                            <span class="error">{{ $errors->first('message') }}</span>
                            @endif
                        </div>
                    </div>
                    <!-- end col  -->

                    <div class="col-lg-12">
                        <div class="form-group">
                            <button class="btn btn--primary">submit enquiry</button>
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
                    <a href="{{ url($page->selling->getFilePath()) }}" class="btn btn-warning" target="_blank">Download
                        Seller’s Guide</a>
                </div>
            </div>
            @endif
            @if(!empty($page->buying))
            <div class="col-lg-4">
                <div class="free-guides-block">
                    <img src="images/MD---Seller-Guide.png" alt="">
                    <h3>{{$page->buying->meta_key}}?</h3>
                    <a href="{{ url($page->buying->getFilePath()) }}" class="btn btn-warning" target="_blank">Download
                        Buyer’s Guide</a>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endif
@stop