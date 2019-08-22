@extends('layouts.app')

@section('title', 'Page Not Found')
@section('meta_keywords', env('APP_NAME'))
@section('meta_description', env('APP_NAME'))

@section('dynamicdata')
    <!--Start of About Us Section-->
    <div class="aboutus-wrap">
        <div class="container">
            <div class="row">
                <!--About Us Section-->
                <div class="col-sm-12 col-md-12">
                    <div class="col-sm-12 col-md-12">
                        <h1 class="inner-about-heading">Page Not Found</h1>
                        <p align="justify">The page you are searching for does not exist anymore or is temporarily available.</p>
                        <a href="{!! route('home') !!}" class="btn btn-info btn-lg detail-btn"><span class="glyphicon glyphicon-menu-left"></span>Back to Home Page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop