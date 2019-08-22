@extends('layouts.app')

@section('title', $page->heading)
@section('meta_keywords', $page->meta_tags)
@section('meta_description', $page->meta_description)

@section('dynamicdata')
    <!--Start of About Us Section-->
    <div class="aboutus-wrap">
        <div class="container">
            <div class="row">
                <!--About Us Section-->
                <div class="col-sm-12 col-md-12">
                    <div class="col-sm-12 col-md-12">
                       <b> <h1 class="inner-about-heading">{!! $page->heading !!}</h1></b>
                        <font color="#00529c">
                        <div align="justify">
                            {!! $page->description !!}
                        </div>
                        </font>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop