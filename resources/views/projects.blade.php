@extends('layouts.app')

@section('title', 'Projects')
@section('meta_keywords', env('APP_NAME'))
@section('meta_description', env('APP_NAME'))

@section('dynamicdata')
    <!--Start of About Us Section-->
    <div class="aboutus-wrap">
        <div class="container">
             <div class="main-title">
                    <h1 style="color:#f26522;"><b>Projects</b></h1>
                </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 md-project-heading>
                    <font color="#0c5aa0">
                   <h4 style="color:#0c5aa0; margin: 0px 0px;"><center><b>Multi Dynamic Experienced Team has been selling projects such as: Apartments  and House & Land Packages</b>
                </h4>
                <h2 class="inner-about-heading"><b>Contact Our Friendly Team Today</b></h2>
                </center>
                </font>
                   <h4 class="inner-about-heading"><center> <p align="justify"><b>Apartments</b></h4></p></center>
                </div>
                <div class="col-sm-6 col-md-6 aboutus-inner-wrap">
                    <div class="inner-about-img">
                        <img src="{{ url('images/projects/apartment1.jpg') }}" class="img-responsive" alt="Project"/>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 our-team-inner-wrap">
                    <div class="inner-about-img">
                        <img src="{{ url('images/projects/apartment2.jpg') }}" class="img-responsive" alt="Project"/>
                    </div>
                </div>
                     <div class="col-sm-12 col-md-12">
                   <h4 class="inner-about-heading"><center> <p align="justify"><b>House & Land</b></h4></p></center>
                </div>
                  <div class="col-sm-6 col-md-6 aboutus-inner-wrap">
                    <div class="inner-about-img">
                        <img src="{{ url('images/projects/house_final1.jpg') }}" class="img-responsive" alt="Project"/>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 our-team-inner-wrap">
                    <div class="inner-about-img">
                        <img src="{{ url('images/projects/house_final2.jpg') }}" class="img-responsive" alt="Project"/>
                    </div>
                </div>
               

                <div class="clear"></div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 projects-sub-footer">
                     
                    <!-- <h2 class="inner-about-heading">Contact Locations:</h2>
 -->
                        <div class="col-sm-6 col-md-3 col-lg-3">
                            <ul class="md-locations">
                                <li><a href="{!! route('properties.search', ['location_id' => 3991]) !!}">Bardia</li>
                                <li><a href="{!! route('properties.search', ['location_id' => 3990]) !!}">Gregory Hills</li>
                                <li><a href="{!! route('properties.search', ['location_id' => 2984]) !!}">Riverstone</li>
                                <li><a href="{!! route('properties.search', ['location_id' => 148]) !!}">Bankstown</li>
                            </ul>
                         </div>

                         <div class="col-sm-6 col-md-3 col-lg-3">
                            <ul class="md-locations">
                                <li><a href="{!! route('properties.search', ['location_id' => 2736]) !!}">Oran Park</li>
                                <li><a href="{!! route('properties.search', ['location_id' => 756]) !!}">Catherine Field</li>
                                <li><a href="{!! route('properties.search', ['location_id' => 2994]) !!}">Rockdale</li>
                                <li><a href="{!! route('properties.search', ['location_id' => 1238]) !!}">Jordan Springs</li>
                            </ul>
                         </div>

                         <div class="col-sm-6 col-md-3 col-lg-3">
                            <ul class="md-locations">
                                <li><a href="{!! route('properties.search', ['location_id' => 472]) !!}">Box Hill</li>
                                <li><a href="{!! route('properties.search', ['location_id' => 97]) !!}">Austral</li>
                                <li><a href="{!! route('properties.search', ['location_id' => 2096]) !!}">Liverpool</li>
                                <li><a href="{!! route('properties.search', ['location_id' => 2047]) !!}">Leppington</li>
                            </ul>
                         </div>

                         <div class="col-sm-6 col-md-3 col-lg-3">
                            <ul class="md-locations">
                                <li><a href="{!! route('properties.search', ['location_id' => 1238]) !!}">Edmondson Park</li>
                                <li><a href="{!! route('properties.search', ['location_id' => 3198]) !!}">Spring Farm</li>
                                <li><a href="{!! route('agents.index') !!}">Others</li>
                            </ul>
                         </div>
                    



<!--
                    <div class="col-md-3 col-sm-3"><a href="{!! route('agents.index') !!}">Bardia</a></div>
                    <div class="col-md-3 col-sm-3"><a href="{!! route('agents.index') !!}">Oran Park</a></div>
                    <div class="col-md-3 col-sm-3"><a href="{!! route('agents.index') !!}">Box Hill</a></div>
                    <div class="col-md-3 col-sm-3"><a href="{!! route('agents.index') !!}">Edmondson Park</a></div>
                    <div class="col-md-3 col-sm-3"><a href="{!! route('agents.index') !!}">Gregory Hills</a></div>
                    <div class="col-md-3 col-sm-3"><a href="{!! route('agents.index') !!}">Catherine Field</a></div>
                    <div class="col-md-3 col-sm-3"><a href="{!! route('agents.index') !!}">Austral</a></div>
                    <div class="col-md-3 col-sm-3"><a href="{!! route('agents.index') !!}">Spring Farm</a></div>
                    <div class="col-md-3 col-sm-3"><a href="{!! route('agents.index') !!}">Riverstone</a></div>
                    <div class="col-md-3 col-sm-3"><a href="{!! route('agents.index') !!}">Rockdale</a></div>
                    <div class="col-md-3 col-sm-3"><a href="{!! route('agents.index') !!}">Liverpool</a></div>
                    <div class="col-md-3 col-sm-3"><a href="{!! route('agents.index') !!}">Others</a></div>
                     <div class="col-md-3 col-sm-3"><a href="{!! route('agents.index') !!}"> Bankstown</a></div>
                      <div class="col-md-3 col-sm-3"><a href="{!! route('agents.index') !!}"> Jordan Springs </a></div>
                       <div class="col-md-3 col-sm-3"><a href="{!! route('agents.index') !!}">Leppington</a></div>
-->

                    {{--@foreach($locations as $location)--}}
                        {{--<div class="col-md-3 col-sm-3"><a href="{!! route('agents.index') !!}">{!! $location->location_name !!}</a></div>--}}
                    {{--@endforeach--}}
                </div>
            </div>
        </div>
    </div>

@stop