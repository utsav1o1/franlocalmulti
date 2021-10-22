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
                    <h3>It’s Our Mission to Find Your Dream Home</h3>
                    <font color="#00529c">
                        <p align="justify">Multi Dynamic is a team of professional and dedicated real estate agents
                            committed to serving the local community. Hardworking, honest and ethical in all we do, our
                            clients are assured of exceptional, consistent service, no matter whether buying, selling,
                            renting or investing. <br>

                        </p>

                        <div class="inner-about-img" style="border: 8px solid #efefef;"><img
                                style="border: 12px solid #fff;" src="../images/multidynamic-team.jpg?v=1"
                                class="img-responsive" alt="Multi Dynamic Tam Member" /></div>
                        <p align="justify">As one of the most trusted and fastest growing firms in Australia, we
                            consider ourselves a one stop solution to all your real estate requirements. You can trust
                            our young and energetic team to deliver the right result.
                        </p>
                        <p align="justify">
                            Whether it’s residential project sales, residential individual sales or property management,
                            one of our Dynamic experts will be ready to assist and provide the highest quality service.
                            We invite you to talk to us today or call on (02) 9618 6209 and book your appointment with a
                            Multi Dynamic agent.
                        </p>
                        <h1 class="inner-about-heading">“Why Multi Dynamic?”</h1>
                        <h3 class="sub-head">“We care for our customers”</h3>

                    </font>
                </div>
                <div class="col-sm-12 col-md-12 sub-head-title">

                    <b>
                        <h4>Save Money and Time</h4>
                    </b>
                    <p align="justify">
                        We’ve done the research, so you don’t have to. Multi Dynamic knows the market well and is here
                        to save you time and money. Together we will find the best option to meet your real estate needs
                        and turn that dream home into a reality.
                    </p>
                    <b>
                        <h4>Professional Service and Strategic Marketing</h4>
                    </b>
                    <p align="justify">Our Sales and Marketing Team know what our clients are looking for, and we have
                        stocks according to our buyers needs. If you are thinking of selling your property through us,
                        our marketing team will walk you through how to get ready to list and ensure success while
                        selling.</p>
                    <b>
                        <h4>Comfort</h4>
                    </b>
                    <p align="justify">Your comfort during the entire sales process is our priority, and we will always
                        ask you what you need before we start our consultation. Our friendly team will help you in
                        making home-related decisions or discuss any difficulties, and provide the easiest solution.
                    </p>
                    <b>

                        <h4>Easy Access </h4>
                    </b>
                    <p align="justify">We have agents all around Sydney, making it easy to locate us, no matter where
                        you live. We are only a minute walk from Sydney’s South West’s Ingleburn Train station. We are
                        open 6 days a week Monday to Saturday (9am to 5pm) for your service. You can simply come and
                        visit us or call us on (02) 9618 6209 to book an appointment or arrange a home visit.</p>
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
                        {{-- @if(file_exists('storage/agents/'. $member->attachment) && $member->attachment != '') --}}
                        @if(!empty($member->getAgentImagePath()))
                        <img src="{!! asset($member->getAgentImagePath()) !!}"
                            alt="{!! $member->first_name .' '. $member->last_name !!}" class="img-responsive">
                        @else
                        <img src="{!! asset('storage/female-avatar.png') !!}"
                            alt="{!! $member->first_name .' '. $member->last_name !!}" class="img-responsive" />
                        @endif
                    </div>
                    <div class="team-text">
                        <h5><a href="{!! route('agents.show', $member->getCustomId()) !!}">{!! $member->first_name .' '.
                                $member->last_name !!}</a></h5>
                        <p class="designation">{!! $member->designation ? $member->designation->designation : '' !!}</p>
                        <div class="team-short-contact">
                            @if($member->phone_number)
                            <p><a href="tel:{!! $member->phone_number !!}"><i
                                        class="glyphicon glyphicon-phone-alt"></i>{!!
                                    substr($member->phone_number,0,2).' '.substr($member->phone_number,2,4).' '.
                                    substr($member->phone_number,6) !!}</a></p>
                            @endif
                            @if($member->mobile_number)
                            <p>
                                <a href="tel:{!! $member->mobile_number !!}"><i
                                        class="glyphicon glyphicon-phone"></i>{!! substr($member->mobile_number,0,4). '
                                    ' .substr($member->mobile_number,4,3).' '.substr($member->mobile_number,7) !!}</a>
                            </p>
                            @endif
                            @if($member->email_address)
                            <p>
                                <a href="mailto:{!! $member->email_address !!}"><i
                                        class="glyphicon glyphicon-envelope"></i>{!! str_limit($member->email_address,
                                    20) !!}</a>
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