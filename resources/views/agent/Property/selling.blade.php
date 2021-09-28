@extends('layouts.app')
@section('title', 'Property Management')
@section('meta_keywords', env('APP_NAME'))
@section('meta_description', env('APP_NAME'))
@section('dynamicdata')
<!-- selling banner  -->
<div class="banner banner--selling">
    <div class="container">
        <div class="banner__caption">
            <h1><span>Thinking about</span>Selling Your Home?</h1>
            <div class="list-property white-bg">LIST YOUR PROPERTY</div>
            <h2>FOR
                ZERO DOLLARS
                UPFRONT</h2>
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
            <form action="">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input class="form-control" type="text" name="" id="" placeholder="Enter your full name">
                        </div>
                    </div>
                    <!-- end col  -->
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input class="form-control" type="email" name="" id="" placeholder="Enter your email">
                        </div>
                    </div>
                    <!-- end col  -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input class="form-control" type="number" name="" id=""
                                placeholder="Enter your phone number">
                        </div>
                    </div>
                    <!-- end col  -->

                    <div class="col-lg-6">
                        <div class="form-group">
                            <input class="form-control" type="text" name="" id="" placeholder="Post code">
                        </div>
                    </div>
                    <!-- end col  -->
                    <div class="col-lg-12">
                        <div class="form-group">
                            <select name="" id="" class="form-control wide">
                                <option value="0">Are you looking to...</option>
                                <option value="1">House</option>
                                <option value="2">Land</option>
                                <option value="3">Building</option>
                            </select>
                        </div>
                    </div>
                    <!-- end col  -->
                    <div class="col-lg-12">
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Tell us more!"></textarea>
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
            <div class="col-lg-4">
                <div class="free-guides-block">
                    <img src="images/MD---Seller-Guide.png" alt="">
                    <h3>SELLING YOUR HOME?</h3>
                    <a href="#" class="btn btn-warning">Download Seller’s Guide</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="free-guides-block">
                    <img src="images/MD---Seller-Guide.png" alt="">
                    <h3>buying a HOME?</h3>
                    <a href="#" class="btn btn-warning">Download Buyer’s Guide</a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop