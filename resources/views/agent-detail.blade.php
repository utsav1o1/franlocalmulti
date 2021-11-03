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
                {{-- @if(file_exists('storage/agents/'. $agent->attachment) && $agent->attachment != '') --}}
                @if(!empty($agent->getAgentImagePath()))
                <div class="agent-detail-img">
                    <img src="{!! asset($agent->getAgentImagePath()) !!}"
                        alt="{!! $agent->first_name .' '. $agent->last_name !!}" class="img-responsive">
                </div>
                @endif
            </div>
            <div class="col-sm-4 col-md-4">
                <div class="agent-detail-text">
                    <h5>{!! $agent->first_name .' '. $agent->last_name !!}</h5>
                    <p class="inner-designation"></p>
                    <div class="inner-agent-short-contact">
                        <p><a href="tel:{!! $agent->phone_number !!}"><i class="glyphicon glyphicon-phone-alt"></i>{!!
                                substr($agent->phone_number,0,2).' '.substr($agent->phone_number,2,4).' '.
                                substr($agent->phone_number,6) !!}</a></p>
                        <p><a href="tel:{!! $agent->mobile_number !!}"><i class="glyphicon glyphicon-phone"></i>{!!
                                substr($agent->mobile_number,0,4). ' ' .substr($agent->mobile_number,4,3).'
                                '.substr($agent->mobile_number,7) !!}</a></p>
                        <p><a href="mailto:{!! $agent->email_address !!}"><i
                                    class="glyphicon glyphicon-envelope"></i>{!! $agent->email !!}</a></p>
                        @if($agent->location)
                        <p><a href="#"><i class="glyphicon glyphicon-flag"></i>{!! $agent->location ?
                                $agent->location->location_name : '' !!}</a></p>
                        @endif
                        <p>
                            <a href="{!! $agent->rate_agent_link !!}" target="_blank">
                                <img src='https://static.ratemyagent.com.au/assets/images/widgets/rma-duo-logo.png'
                                    width='164' height='40' />
                                <span>Rate My Agent</span>
                            </a>
                        </p>
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
<div class="agent-detail-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-7">
                <div class="agent-description">
                    {!! $agent->description !!}
                </div>

            </div>

            <div class="col-sm-4 col-md-5">
                <div class="form-group agent-form">
                    <h3>Contact the agent</h3>
                    <p>Contact agent for more details</p>
                    @include('layouts.alert')
                    <form action="{!! route('agents.submit.contact', $agent->id) !!}" method="post">
                        <div class="row agent-field">
                            <label class="control-label col-sm-2 col-md-2" for="name">Name</label>
                            <div class="col-sm-10 col-md-10">
                                <input type="text" class="form-control agent-form-control" name="full_name"
                                    placeholder="Enter your full name" required />
                            </div>
                        </div>
                        <div class="row agent-field">
                            <label class="control-label col-sm-2 col-md-2" for="email">Email</label>
                            <div class="col-sm-10 col-md-10">
                                <input type="email" class="form-control agent-form-control" name="email_address"
                                    placeholder="Enter email address" required />
                            </div>
                        </div>
                        <div class="row agent-field">
                            <label class="control-label col-sm-2 col-md-2" for="phone">Phone</label>
                            <div class="col-sm-10 col-md-10">
                                <input type="text" class="form-control agent-form-control" name="phone_number"
                                    placeholder="Enter phone number" />
                            </div>
                        </div>
                        <div class="row agent-field">
                            <label class="control-label col-sm-2 col-md-2" for="message">Message</label>
                            <div class="col-sm-10 col-md-10">
                                <textarea type="text" class="form-control agent-form-control" name="message" rows="4"
                                    placeholder="Leave your message"></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label col-sm-2 col-md-2" for="ReCaptcha"></label>
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}

                            @if($errors->has('g-recaptcha-response'))
                            <small class="validation-error-message">{{ $errors->get('g-recaptcha-response')[0]
                                }}</small>
                            @endif
                        </div>
                        {!! csrf_field() !!}
                        <input type="hidden" name="agent_id" value="{!! $agent->id !!}" />
                        <button type="submit" class="btn btn-default agent-btn"><i
                                class="glyphicon glyphicon-send"></i>Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- team tab  -->
<div class="team-tab">
    <div class="container">
        <ul class="nav nav-tabs" role="tablist">
            @if($agent->property_manage_type=='1')
            <li role="presentation" @if(Request::query('tab')==null || Request::query('tab')=='sold' ) class="active"
                @endif><a href="#sold" aria-controls="sold" role="tab" data-toggle="tab">Sold</a></li>

            <li role="presentation" @if ( Request::query('tab')=='buy' ) class="active" @endif><a href="#buy"
                    aria-controls="buy" role="tab" data-toggle="tab">Current Listing</a></li>
            @else
            <li role="presentation" @if ( Request::query('tab')==null ||Request::query('tab')=='leased' ) class="active"
                @endif><a href="#leased" aria-controls="leased" role="tab" data-toggle="tab">Leased</a>
            </li>
            <li role="presentation" @if ( Request::query('tab')=='rent' ) class="active" @endif><a href="#rent"
                    aria-controls="rent" role="tab" data-toggle="tab">Rental</a></li>
            @endif

        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            @if($agent->property_manage_type=='1')
            @if(count($soldProperties)>0)
            <div role="tabpanel" class="tab-pane @if(Request::query('tab')==null || Request::query('tab')=='sold' ) active
                @endif" id="sold">
                <div class="fefatured__property__tab">
                    <div class="row">
                        @foreach($soldProperties as $property)
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="thumbnail">
                                <div class="thumbnail recent-properties-box">
                                    <a class="thumbnail-container"
                                        href="{!! route('properties.show', $property->slug) !!}">

                                        <img src="{!! url($property->getImage()) !!}" alt="{!! $property->name !!}"
                                            class="img-responsive" />
                                    </a>
                                    <!--Caption Detail-->
                                    <div class="caption detail">
                                        <header>
                                            <div class="pull-left">
                                                <h1 class="title">
                                                    <a href="{!! route('properties.show', $property->slug) !!}">{!!
                                                        str_limit($property->name, 30) !!}</a>
                                                </h1>
                                            </div>

                                            <div class="price-block">
                                                <div class="starting-price">{!! $property->price_type_name !!}</div>
                                                <div class="price">
                                                    <?php if(is_null($property->price_view)) {?>
                                                    {{ $property->getFormattedPrice() }}
                                                    <?php }
                                                                    else { ?>
                                                    <span style="font-size: 12px">{{ str_limit(
                                                        $property->price_view,22)}}</span>
                                                    <?php }?>
                                                </div>
                                            </div>
                                            <!--Area Block-->
                                            <div class="area-block">
                                                <div class="property-type">Property Type</div>
                                                <div class="property-area">{!! $property->property_type_name !!}</div>
                                            </div>
                                        </header>
                                        <!--Location-->
                                        <h3 class="location">
                                            @if($property->location)
                                            <a href="#">
                                                <i class="fa fa-map-marker"></i>{!! $property->location_name !!}
                                            </a>
                                            @endif
                                        </h3>
                                        <!--Item Details-->
                                        <ul class="item-details col-md-12">
                                            <li>
                                                <p class="item-area">@if($property->area > 0) {!! $property->area !!}
                                                    m<sup>2</sup>@else --.-- @endif</p>
                                            </li>

                                            <li>
                                                <p class="item-bed">{!! $property->number_of_bedrooms !!} Bedroom</p>
                                            </li>
                                            <li>
                                                <p class="item-bath">{!! $property->number_of_bathrooms !!} Bathroom</p>
                                            </li>
                                            <li>
                                                <p class="item-garage">{!! $property->number_of_garages !!} Garage</p>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                        <div class="detail-footer">
                                            <a href="{!! route('properties.show', $property->slug) !!}"><i
                                                    class="fa-user"></i>
                                                {{ $property->agents_count }}
                                                {{ ($property->agents_count < 2) ? 'agent' : 'agents' }}</a>
                                                    <span><i class="fa-calendar-o"></i>{!!
                                                        App\Http\Helper::time_elapsed_string($property->created_at)
                                                        !!}</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                        {!! $soldProperties->appends(['tab' => 'sold'])->links() !!}
                    </div>
                </div>
            </div>
            @else
            <div role="tabpanel" class="tab-pane @if(Request::query('tab')==null || Request::query('tab')=='sold' ) active
                @endif" id="sold">
                <div class="fefatured__property__tab">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <p>No properties to show.</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if(count($buyProperties)>0)
            <div role="tabpanel" class="tab-pane @if ( Request::query('tab') == 'buy') active @endif" id="buy">
                <div class="fefatured__property__tab">
                    <div class="row">
                        @foreach($buyProperties as $property)
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="thumbnail">
                                <div class="thumbnail recent-properties-box">
                                    <a class="thumbnail-container"
                                        href="{!! route('properties.show', $property->slug) !!}">

                                        <img src="{!! url($property->getCoverImage()) !!}" alt="{!! $property->name !!}"
                                            class="img-responsive" />
                                    </a>
                                    <!--Caption Detail-->
                                    <div class="caption detail">
                                        <header>
                                            <div class="pull-left">
                                                <h1 class="title">
                                                    <a href="{!! route('properties.show', $property->slug) !!}">{!!
                                                        str_limit($property->name, 30) !!}</a>
                                                </h1>
                                            </div>

                                            <div class="price-block">
                                                <div class="starting-price">{!! $property->price_type_name !!}</div>
                                                <div class="price">
                                                    <?php if(is_null($property->price_view)) {?>
                                                    {{ $property->getFormattedPrice() }}
                                                    <?php }
                                                                                else { ?>
                                                    <span style="font-size: 12px">{{ str_limit(
                                                        $property->price_view,22)}}</span>
                                                    <?php }?>
                                                </div>
                                            </div>
                                            <!--Area Block-->
                                            <div class="area-block">
                                                <div class="property-type">Property Type</div>
                                                <div class="property-area">{!! $property->property_type_name !!}</div>
                                            </div>
                                        </header>
                                        <!--Location-->
                                        <h3 class="location">
                                            @if($property->location)
                                            <a href="#">
                                                <i class="fa fa-map-marker"></i>{!! $property->location_name !!}
                                            </a>
                                            @endif
                                        </h3>
                                        <!--Item Details-->
                                        <ul class="item-details col-md-12">
                                            <li>
                                                <p class="item-area">@if($property->area > 0) {!! $property->area !!}
                                                    m<sup>2</sup>@else --.-- @endif</p>
                                            </li>

                                            <li>
                                                <p class="item-bed">{!! $property->number_of_bedrooms !!} Bedroom</p>
                                            </li>
                                            <li>
                                                <p class="item-bath">{!! $property->number_of_bathrooms !!} Bathroom</p>
                                            </li>
                                            <li>
                                                <p class="item-garage">{!! $property->number_of_garages !!} Garage</p>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                        <div class="detail-footer">
                                            <a href="{!! route('properties.show', $property->slug) !!}"><i
                                                    class="fa-user"></i>
                                                {{ $property->agents_count }}
                                                {{ ($property->agents_count < 2) ? 'agent' : 'agents' }}</a>
                                                    <span><i class="fa-calendar-o"></i>{!!
                                                        App\Http\Helper::time_elapsed_string($property->created_at)
                                                        !!}</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {!! $buyProperties->appends(['tab' => 'buy'])->links() !!}
                    </div>
                </div>
            </div>
            @else
            <div role="tabpanel" class="tab-pane @if ( Request::query('tab')=='buy' ) active @endif" id="buy">
                <div class="fefatured__property__tab">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <p>No properties to show.</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @else
            @if(count($leasedProperties)>0)
            <div role="tabpanel"
                class="tab-pane @if ( Request::query('tab')==null ||Request::query('tab') == 'leased') active @endif"
                id="leased">
                <div class="fefatured__property__tab">
                    <div class="row">
                        @foreach($leasedProperties as $property)
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="thumbnail">
                                <div class="thumbnail recent-properties-box">
                                    <a class="thumbnail-container"
                                        href="{!! route('properties.show', $property->slug) !!}">

                                        <img src="{!! url($property->getCoverImage()) !!}" alt="{!! $property->name !!}"
                                            class="img-responsive" />
                                    </a>
                                    <!--Caption Detail-->
                                    <div class="caption detail">
                                        <header>
                                            <div class="pull-left">
                                                <h1 class="title">
                                                    <a href="{!! route('properties.show', $property->slug) !!}">{!!
                                                        str_limit($property->name, 30) !!}</a>
                                                </h1>
                                            </div>

                                            <div class="price-block">
                                                <div class="starting-price">{!! $property->price_type_name !!}</div>
                                                <div class="price">
                                                    <?php if(is_null($property->price_view)) {?>
                                                    {{ $property->getFormattedPrice() }}
                                                    <?php }
                                                                    else { ?>
                                                    <span style="font-size: 12px">{{ str_limit(
                                                        $property->price_view,22)}}</span>
                                                    <?php }?>
                                                </div>
                                            </div>
                                            <!--Area Block-->
                                            <div class="area-block">
                                                <div class="property-type">Property Type</div>
                                                <div class="property-area">{!! $property->property_type_name !!}</div>
                                            </div>
                                        </header>
                                        <!--Location-->
                                        <h3 class="location">
                                            @if($property->location)
                                            <a href="#">
                                                <i class="fa fa-map-marker"></i>{!! $property->location_name !!}
                                            </a>
                                            @endif
                                        </h3>
                                        <!--Item Details-->
                                        <ul class="item-details col-md-12">
                                            <li>
                                                <p class="item-area">@if($property->area > 0) {!! $property->area !!}
                                                    m<sup>2</sup>@else --.-- @endif</p>
                                            </li>

                                            <li>
                                                <p class="item-bed">{!! $property->number_of_bedrooms !!} Bedroom</p>
                                            </li>
                                            <li>
                                                <p class="item-bath">{!! $property->number_of_bathrooms !!} Bathroom</p>
                                            </li>
                                            <li>
                                                <p class="item-garage">{!! $property->number_of_garages !!} Garage</p>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                        <div class="detail-footer">
                                            <a href="{!! route('properties.show', $property->slug) !!}"><i
                                                    class="fa-user"></i>
                                                {{ $property->agents_count }}
                                                {{ ($property->agents_count < 2) ? 'agent' : 'agents' }}</a>
                                                    <span><i class="fa-calendar-o"></i>{!!
                                                        App\Http\Helper::time_elapsed_string($property->created_at)
                                                        !!}</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {!! $leasedProperties->appends(['tab' => 'leased'])->links() !!}
                    </div>
                </div>
            </div>
            @else
            <div role="tabpanel"
                class="tab-pane @if ( Request::query('tab')==null || Request::query('tab')=='leased' ) active @endif"
                id="leased">
                <div class="fefatured__property__tab">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <p>No properties to show.</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif


            @if(count($rentProperties)>0)
            <div role="tabpanel" class="tab-pane @if ( Request::query('tab') == 'rent') active @endif" id="rent">
                <div class="fefatured__property__tab">
                    <div class="row">
                        @foreach($rentProperties as $property)
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="thumbnail">
                                <div class="thumbnail recent-properties-box">
                                    <a class="thumbnail-container"
                                        href="{!! route('properties.show', $property->slug) !!}">

                                        <img src="{!! url($property->getCoverImage()) !!}" alt="{!! $property->name !!}"
                                            class="img-responsive" />
                                    </a>
                                    <!--Caption Detail-->
                                    <div class="caption detail">
                                        <header>
                                            <div class="pull-left">
                                                <h1 class="title">
                                                    <a href="{!! route('properties.show', $property->slug) !!}">{!!
                                                        str_limit($property->name, 30) !!}</a>
                                                </h1>
                                            </div>

                                            <div class="price-block">
                                                <div class="starting-price">{!! $property->price_type_name !!}</div>
                                                <div class="price">
                                                    <?php if(is_null($property->price_view)) {?>
                                                    {{ $property->getFormattedPrice() }}
                                                    <?php }
                                                                    else { ?>
                                                    <span style="font-size: 12px">{{ str_limit(
                                                        $property->price_view,22)}}</span>
                                                    <?php }?>
                                                </div>
                                            </div>
                                            <!--Area Block-->
                                            <div class="area-block">
                                                <div class="property-type">Property Type</div>
                                                <div class="property-area">{!! $property->property_type_name !!}</div>
                                            </div>
                                        </header>
                                        <!--Location-->
                                        <h3 class="location">
                                            @if($property->location)
                                            <a href="#">
                                                <i class="fa fa-map-marker"></i>{!! $property->location_name !!}
                                            </a>
                                            @endif
                                        </h3>
                                        <!--Item Details-->
                                        <ul class="item-details col-md-12">
                                            <li>
                                                <p class="item-area">@if($property->area > 0) {!! $property->area !!}
                                                    m<sup>2</sup>@else --.-- @endif</p>
                                            </li>

                                            <li>
                                                <p class="item-bed">{!! $property->number_of_bedrooms !!} Bedroom</p>
                                            </li>
                                            <li>
                                                <p class="item-bath">{!! $property->number_of_bathrooms !!} Bathroom</p>
                                            </li>
                                            <li>
                                                <p class="item-garage">{!! $property->number_of_garages !!} Garage</p>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                        <div class="detail-footer">
                                            <a href="{!! route('properties.show', $property->slug) !!}"><i
                                                    class="fa-user"></i>
                                                {{ $property->agents_count }}
                                                {{ ($property->agents_count < 2) ? 'agent' : 'agents' }}</a>
                                                    <span><i class="fa-calendar-o"></i>{!!
                                                        App\Http\Helper::time_elapsed_string($property->created_at)
                                                        !!}</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {!! $rentProperties->appends(['tab' => 'rent'])->links() !!}
                    </div>
                </div>
            </div>
            @else
            <div role="tabpanel" class="tab-pane @if ( Request::query('tab')=='rent' ) active @endif" id="rent">
                <div class="fefatured__property__tab">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <p>No properties to show.</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endif

        </div>
    </div>
</div>
<!-- team tab end  -->
@stop
@section('footer_js')
<script>
    $(document).ready(function (e) {
        $('.nav-tabs').on('click', function () {
            $("body").removeClass("active");
            $(this).addClass("active");

        })

        // this is when tab click if needed then we implement this code
        // $("ul.nav.nav-tabs li a").click(function (e) {
        //     var tab_id = ''
        //     tab_id=$(this).attr('href');
        //     var currentUrl = window.location.href;
           
        //     var url = new URL(currentUrl);
        //     url.searchParams.set("tab", tab_id.replace('#', '')); // setting your param
        //     url.searchParams.set("page", 1); // setting your param
        //     var newUrl = url.href;
        //     newUrl = newUrl.split('#', 1)[0].concat(tab_id)
        //     window.location.href = newUrl;
        // });
    })

</script>
@endsection