@extends('layouts.app')

@section('title', 'About Us')
@section('meta_keywords', env('APP_NAME'))
@section('meta_description', env('APP_NAME'))

@section('dynamicdata')
    <!--Start of About Us Section-->
    <div class="aboutus-wrap">
        <div class="container">
            <div class="row custom-top-spacing">
                <!--About Us Section-->
                <div class="col-sm-6 col-md-6 aboutus-inner-wrap">
                    <div class="col-sm-12 col-md-12 sub-head">
                        <h1 class="inner-about-heading">About Us</h1>
                        <h3>Your Dream Home is Our Mission</h3>
                        <font color="#00529c">
                        <p align="justify">Multi Dynamic is a team of a professional and dynamic real estate Agency who are dedicated to serve the community with their hard-working nature & honest work ethics. We have promised to give an exceptional service with consistency, regarding any of our Real Estate Service. “Multi Dynamic has proved to be one of the trusted & fastest growing real estate in Australia”.  <br>

                        </p>

                        <div class="inner-about-img"><img src="../images/multidynamic-team.jpg" class="img-responsive" alt="Multi Dynamic Tam Member"/></div>
                        <p align="justify">Our Team is focused on – Residential Project Sales, Residential Individual Sales & Property Management. <br>
                            We are one stop solution to all your Real Estate needs. Feel free to talk to our Dynamic Experts if you have any questions regarding Real Estate Service. Our Young and Energetic Team are always ready to provide the best service, that a client would expect from an agent. Come have a chat to us today or call us to book your appointment with Multi Dynamic. 
                        </p>
                        <h1 class="inner-about-heading">“Why Multi Dynamic?”</h1>
                        <h3 class="sub-head">“We care for our Customers”</h3>
                        
                        </font>
                    </div>
                    <div class="col-sm-12 col-md-12 sub-head-title">
                        
                                             
                       
                     <b>   <h4>Save Money & Time</h4></b>
                        <p align="justify">Our Research in property market, Our Analysis, Records & Study of the past and present tells us where and what is the best option for you, when you are thinking of your Dream Home. You won’t be wondering anymore once you visit Multi Dynamic.</p>
                      <b>  <h4>Good Sales & Marketing</h4></b>
                        <p align="justify">Our Sales and Marketing Team knows what our clients are looking for. We have our stocks according to our buyers need. If you are thinking of selling your property through us, our marketing team will explain you how to market and get 100% success while selling. </p>
                     <b>   <h4>Comfort</h4></b>
                        <p align="justify">We ask our clients what they want before we start our consultation. Our Friendly Team will help you in making home-related decisions or your difficulties to decide what to do, by providing the easiest solution. </p>
                      <b>  

                        <h4>Easy Access </h4></b>
                        <p align="justify">We have allocated our agents all around Sydney, so you can find one of us wherever you are. We also do home visits in the case of your urgency. We are only a minute walk from Sydney’s South West’s Ingleburn Train station. We are open 6 days a week Monday to Saturday (9am to 5pm) for your service. You can simply come and visit us or call us to book an appointment.</p>
                         </font>
                    </div>
                </div>
                <!--Our Team Section-->
                <div class="col-sm-6 col-md-6 our-team-inner-wrap">
                    <div class="inner-our-team-heading">
                      <font color="#f26522">
                        <h1><b>Our Team</b></h1>
                    </font>
                    </div>
                    
                    @foreach($coreMembers as $member)
                    <div class="col-sm-6 col-md-6 our-team-block">
                        <div class="team-image">
                        @if(file_exists('storage/agents/'. $member->attachment) && $member->attachment != '')
                            <img src="{!! asset('storage/agents/'. $member->attachment) !!}" alt="{!! $member->first_name .' '. $member->last_name !!}" class="img-responsive">
                        @else
                            <img src="{!! asset('storage/female-avatar.png') !!}"
                                                 alt="{!! $member->first_name .' '. $member->last_name !!}"
                                                 class="img-responsive"/>
                                        @endif
                        </div>
                        <div class="team-text">
                            <h5><a href="{!! route('agents.show', $member->getCustomId()) !!}">{!! $member->first_name .' '. $member->last_name !!}</a></h5>
                            <p class="designation">{!! $member->designation ? $member->designation->designation : '' !!}</p>
                            <div class="team-short-contact">
                                @if($member->phone_number)
                                <p><a href="tel:{!! $member->phone_number !!}"><i class="glyphicon glyphicon-phone-alt"></i>{!! substr($member->phone_number,0,2).' '.substr($member->phone_number,2,4).' '. substr($member->phone_number,6) !!}</a></p>
                                @endif
                                @if($member->mobile_number)
                                                <p>
                                                    <a href="tel:{!! $member->mobile_number !!}"><i class="glyphicon glyphicon-phone"></i>{!! substr($member->mobile_number,0,4). ' '  .substr($member->mobile_number,4,3).' '.substr($member->mobile_number,7) !!}</a>
                                                </p>
                                @endif
                                @if($member->email_address)
                                <p>
                                    <a href="mailto:{!! $member->email_address !!}"><i class="glyphicon glyphicon-envelope"></i>{!! str_limit($member->email_address, 20) !!}</a>
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@stop