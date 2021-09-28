@extends('layouts.app')
@section('title', 'Property Management')
@section('meta_keywords', env('APP_NAME'))
@section('meta_description', env('APP_NAME'))
@section('dynamicdata')
<!--Start of Body Part-->

<div class="guide">
    <div class="container">
        <div class="guide__block">
            <h2>Thank you for submitting your information.</h2>
            <p>we have sent the guides to your email or simply click one of the buttons below to download your
                digital copy.</p>
        </div>

        <div class="guide__block__wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <div class="inner__block">
                        <img src="images/MD---Seller-Guide.png" alt="">
                        <h3>SELLING YOUR HOME?</h3>
                        <a href="#" class="btn btn-warning">Download Seller’s Guide</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="inner__block">
                        <img src="images/MD---Seller-Guide.png" alt="">
                        <h3>buying a HOME?</h3>
                        <a href="#" class="btn btn-warning">Download Buyer’s Guide</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--START OF MAIN FOOTER-->
@stop