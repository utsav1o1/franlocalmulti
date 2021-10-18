@extends('layouts.app')

@section('title', $agent->first_name .' '. $agent->last_name)
@section('meta_keywords', env('APP_NAME'))
@section('meta_description', env('APP_NAME'))

@section('dynamicdata')
    <!--Start of Agent Body-->
    <div class="agent-top-wrap">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-4 agent-img-block">
                    @if(file_exists('storage/agents/'. $agent->attachment) && $agent->attachment != '')
                        <div class="agent-detail-img">
                            <img src="{!! asset('storage/agents/'. $agent->attachment) !!}" alt="{!! $agent->first_name .' '. $agent->last_name !!}" class="img-responsive">
                        </div>
                    @endif
                </div>
                <div class="col-sm-4 col-md-4">
                    <div class="agent-detail-text">
                        <h5>{!! $agent->first_name .' '. $agent->last_name !!}</h5>
                        <p class="inner-designation"></p>
                        <div class="inner-agent-short-contact">
                            <p><a href="tel:{!! $agent->phone_number !!}"><i class="glyphicon glyphicon-phone-alt"></i>{!! substr($agent->phone_number,0,2).' '.substr($agent->phone_number,2,4).' '. substr($agent->phone_number,6) !!}</a></p>
                            <p><a href="tel:{!! $agent->mobile_number !!}"><i class="glyphicon glyphicon-phone"></i>{!! substr($agent->mobile_number,0,4). ' '  .substr($agent->mobile_number,4,3).' '.substr($agent->mobile_number,7) !!}</a></p>
                            <p><a href="mailto:{!! $agent->email_address !!}"><i class="glyphicon glyphicon-envelope"></i>{!! $agent->email_address !!}</a></p>
                            <p><a href="#"><i class="glyphicon glyphicon-flag"></i>{!! $agent->location ? $agent->location->location_name : '' !!}</a></p>
                            <p><a href={!! $agent->rate_agent_link !!}> <img src='https://static.ratemyagent.com.au/assets/images/widgets/rma-duo-logo.png' width='164' height='40' /><span>Rate My Agent</span></a></p>                        
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4">
                    <div class="agent-sm">
                        <a href="https://www.facebook.com/" target="_blank" class="fa fa-facebook facebook"></a>
                        <a href="https://twitter.com/" target="_blank" class="fa fa-twitter twitter"></a>
                        <a href="https://www.linkedin.com/" target="_blank" class="fa fa-linkedin linkedin"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Agent Description and Form Section-->
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-8">
                <div class="agent-description">
                    {!! $agent->description !!}
                </div>

            </div>

            <div class="col-sm-4 col-md-4">
                <div class="form-group agent-form">
                    <h3>Contact the agent</h3>
                    <p>Contact agent for more details</p>
                    @include('layouts.alert')
                    <form action="{!! route('agents.submit.contact', $agent->id) !!}" method="post">
                        <div class="row agent-field">
                            <label class="control-label col-sm-2 col-md-2" for="name">Name</label>
                            <div class="col-sm-10 col-md-10">
                                <input type="text" class="form-control agent-form-control" name="full_name" placeholder="Enter your full name" required/>
                            </div>
                        </div>
                        <div class="row agent-field">
                            <label class="control-label col-sm-2 col-md-2" for="email">Email</label>
                            <div class="col-sm-10 col-md-10">
                                <input type="email" class="form-control agent-form-control" name="email_address" placeholder="Enter email address" required/>
                            </div>
                        </div>
                        <div class="row agent-field">
                            <label class="control-label col-sm-2 col-md-2" for="phone">Phone</label>
                            <div class="col-sm-10 col-md-10">
                                <input type="text" class="form-control agent-form-control" name="phone_number" placeholder="Enter phone number" />
                            </div>
                        </div>
                        <div class="row agent-field">
                            <label class="control-label col-sm-2 col-md-2" for="message">Message</label>
                            <div class="col-sm-10 col-md-10">
                                <textarea type="text" class="form-control agent-form-control" name="message" rows="4" placeholder="Leave your message"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <label class="control-label col-sm-2 col-md-2" for="ReCaptcha"></label>
                            <script src="https://www.google.com/recaptcha/api.js?" async defer></script>
                            <div data-sitekey="6Lc8y90UAAAAAHGkmqzQQ5Eibu-nlNZUCVFus0qR" class="g-recaptcha">
                            </div>
                        </div>
                        {!! csrf_field() !!}
                        <input type="hidden" name="agent_id" value="{!! $agent->id !!}" />
                        <button type="submit" class="btn btn-default agent-btn"><i class="glyphicon glyphicon-send"></i>Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
