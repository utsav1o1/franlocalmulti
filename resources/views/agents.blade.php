@extends('layouts.app')

@section('title', 'Agents')
@section('meta_keywords', env('APP_NAME'))
@section('meta_description', env('APP_NAME'))

@section('dynamicdata')
<!--Result Part-->
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-9">
            <div class="row">
                <div class="search-result">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="agent-result-head">
                                <font color="#f26522">
                                    <h2><b>Talk To Our Team</b></h2>
                                </font>
                                <font color="#00529c">
                                    <p><b>Looking to get the best value for your property?</b></p>
                                </font>
                            </div>
                        </div>
                    </div>
                    <div class="row tab-content">
                        @foreach($agents as $agent)
                        <a class="agent-detail-link" href="{!! route('agents.show', encrypt($agent->id)) !!}">
                            <div class="col-lg-4 col-md-4 col-sm-6 agent-block">
                                <div class="agent-wrapper">
                                    <div class="agent-image">
                                        <a href="{!! route('agents.show', $agent->getCustomId()) !!}">
                                            @if(!empty($agent->avatar))
                                            <img src="{!! asset($agent->getAgentImagePath()) !!}"
                                                alt="{!! $agent->first_name .' '. $agent->last_name !!}"
                                                class="img-responsive">
                                            @else
                                            <img src="{!! asset('storage/female-avatar.png') !!}"
                                                alt="{!! $agent->first_name .' '. $agent->last_name !!}"
                                                class="img-responsive" />
                                            @endif
                                        </a>
                                    </div>
                                    <div class="agent-text">
                                        <h5>
                                            <a href="{!! route('agents.show', $agent->getCustomId()) !!}">{!!
                                                $agent->first_name .' '.
                                                $agent->last_name !!}
                                            </a>
                                        </h5>
                                        <p class="designation">{!! $agent->designation ? $agent->designation->name : ''
                                            !!}</p>
                                        <div class="agent-short-contact">
                                            @if($agent->phone_number)
                                            <p>
                                                <a href="tel:{!! $agent->phone_number !!}"><i
                                                        class="glyphicon glyphicon-phone-alt"></i>{!!
                                                    substr($agent->phone_number,0,2).'
                                                    '.substr($agent->phone_number,2,4).' '.
                                                    substr($agent->phone_number,6) !!}</a>
                                            </p>
                                            @endif
                                            @if($agent->mobile_number)
                                            <p>
                                                <a href="tel:{!! $agent->mobile_number !!}"><i
                                                        class="glyphicon glyphicon-phone"></i>{!!
                                                    substr($agent->mobile_number,0,4). ' '
                                                    .substr($agent->mobile_number,4,3).'
                                                    '.substr($agent->mobile_number,7) !!}</a>
                                            </p>
                                            @endif
                                            @if($agent->email)
                                            <p>
                                                <a href="mailto:{!! $agent->email !!}"><i
                                                        class="glyphicon glyphicon-envelope"></i>{!!
                                                    str_limit($agent->email,
                                                    15) !!}</a>
                                            </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    <div class="clear"></div>
                    {!! $agents->render() !!}
                </div>
            </div>
        </div>
        <!--SIDEBAR COLUMN-->
        <!--SIDEBAR SECTION-->

        <div class="custom-top-spacing"></div>
        <div style="margin-top: 110px;"></div>

        @include('layouts.property-search-sidebar')


        <div class="col-sm-3 col-md-3 pull-right">
            @if($user)
            <div class="row">
                <div class="col-sm-12-md-12">
                    <div class="list-group">
                        <a href="#" class="list-group-item side-bar-head">Recently Saved Properties</a>
                        @foreach($savedProperties as $index=>$savedProperty)
                        <a href="{!! route('properties.show', $savedProperty->slug) !!}" class="list-group-item">{!!
                            $savedProperty->name !!}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-sm-12-md-12">
                    <div class="list-group">
                        <p class="list-group-item side-bar-head">Recently Added Properties</p>
                        @foreach($recentProperties as $index=>$recentProperty)
                        <a href="{!! route('properties.show', $recentProperty->slug) !!}" class="list-group-item">{!!
                            $recentProperty->name !!}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <!--Recently Viewed Properties-->
            <div class="row">
                <div class="col-sm-12-md-12">
                    <div class="list-group">
                        <p class="list-group-item side-bar-head">Most Viewed Properties</p>
                        @foreach($popularProperties as $index=>$viewedProperty)
                        <a href="{!! route('properties.show', $viewedProperty->slug) !!}" class="list-group-item">{!!
                            $viewedProperty->name !!}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop