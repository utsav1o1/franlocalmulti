@extends('layouts.app')
@section('title', 'Home')
@section('meta_keywords', env('APP_NAME'))
@section('meta_description', env('APP_NAME'))
@section('dynamicdata')
<!--Start of Body Part-->

<div class="thankyou-section">
    <div class="container">
        <div class="thankyou-block">
            <h2>Thank you for submitting
                your information.</h2>
            <p>Our team will be in touch with you within the next few days
                to find out how we can help you get to where you want be.</p>
            <p>You can also email us at: <a href="mailto:auburn@multidynamic.com.au">auburn@multidynamic.com.au</a></p>
        </div>
    </div>
</div>
<!--START OF MAIN FOOTER-->
@endsection