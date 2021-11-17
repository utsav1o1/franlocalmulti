@extends('layouts.app')
@section('title', 'Property Management')
@section('meta_keywords', env('APP_NAME'))
@section('meta_description', env('APP_NAME'))
@section('dynamicdata')
<!-- selling banner  -->

@if(!empty($page))
<div class="banner banner--property" style="background-image: url('{{ url($page->getImagePath()) }}')">
    <div class="container">
        <div class="banner__caption">
            <h1>{{$page->sub_heading}}</h1>
            <p>{!! $page->short_description !!}</p>
            <a href="#property-evaluation">BOOK a PROPERTY APPRAISAL</a>
        </div>
    </div>
</div>
<!-- end selling banner  -->
@if(!empty($page->property_management))
<div class="text-center property__management">
    <div class="container">
        <h2>{{$page->property_management->meta_key}}</h2>
        {!! $page->property_management->meta_value !!}
        <a href="{{ route('contact-us.form') }}">contact us now</a>
    </div>
</div>
@endif
<!-- end prpperty management  -->
@if(!empty($managers))

<div class="typical__property">
    <div class="container">
        <h2>WE OFFER MORE THAN A TYPICAL PROPERTY MANAGER</h2>
        <ul>
            @foreach($managers as $manager)
            <li>
                <div class="typical__property__wrapper">
                    <div class="image-wrapper">
                        <img src="{{ url($manager->getImagePath()) }}" alt="">
                    </div>
                    <div class="content-wrapper">
                        <h3>{{$manager->title}}</h3>
                        {!! $manager->short_description !!}
                        <a href="{!! $manager->link !!}">Read more</a>
                    </div>
                </div>
            </li>
            @endforeach
            <!-- end list  -->

        </ul>
    </div>
</div>
@endif

<div class="free-apprisal-banner">
    <div class="container">
        <div class="banner-wrapper">
            <img src="images/banner.png" alt="">
        </div>
    </div>
</div>
<!-- end appraisal banner  -->

@if($properties)


<div class="recent__rentals">
    <div class="container">
        <h2>View our recently leased rentals</h2>
        <div class="recent__rentals__slider">
            @foreach ($properties as $property)
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="thumbnail">
                    <div class="thumbnail recent-properties-box">
                        <a class="thumbnail-container" href="{!! route('properties.show', $property->slug) !!}">

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
                                    <div class="price">{{ $property->getFormattedPrice() }}</div>
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
                                <a href="{!! route('properties.show', $property->slug) !!}"><i class="fa-user"></i>
                                    {{ $property->agents_count }}
                                    {{ ($property->agents_count < 2) ? 'agent' : 'agents' }}</a>
                                        <span><i class="fa-calendar-o"></i>{!!
                                            App\Http\Helper::time_elapsed_string($property->created_at) !!}</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endif
<div class="property-evaluation-block">
    <div class="container">
        <h2>Curious about your property's value?</h2>
        <p>Don’t list in Ingleburn without talking to Ingleburn’s premium property experts</p>
        <div class="property-evaluation-wrapper" id="property-evaluation">
            <h2>Free Property Evaluation!</h2>
            <p>We’ll send you a comprehensive, personalised report with in-depth analysis and market insights from
                Multi Dynamic</p>
            <form method="POST" id="propertyEvaluationForm">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <input type="text" name="name" id="" placeholder="Enter your name" class="form-control">
                            {{-- @if($errors->has('name'))
                            <span class="error">{{ $errors->first('name') }}</span>
                            @endif --}}
                            <span class='text-danger error name'
                                style='display:none;font-size:11px;color:white;'></span>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <input type="email" name="email" id="" placeholder="Enter your email" class="form-control">
                            {{-- @if($errors->has('email'))
                            <span class="error">{{ $errors->first('email') }}</span>
                            @endif --}}
                            <span class='text-danger error email'
                                style='display:none;font-size:11px;color:white;'></span>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <input type="number" name="phone" id="" placeholder="Enter your phone" class="form-control">
                            {{-- @if($errors->has('phone'))
                            <span class="error">{{ $errors->first('phone') }}</span>
                            @endif --}}
                            <span class='text-danger error phone'
                                style='display:none;font-size:11px;color:white;'></span>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <input type="number" name="postal_code" id="" placeholder="Enter your postal code"
                                class="form-control">
                            {{-- @if($errors->has('postal_code'))
                            <span class="error">{{ $errors->first('postal_code') }}</span>
                            @endif --}}
                            <span class='text-danger error postal_code'
                                style='display:none;font-size:11px;color:white;'></span>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="text" name="property_address" id="" placeholder="Enter your property address"
                                class="form-control">
                            {{-- @if($errors->has('property_address'))
                            <span class="error">{{ $errors->first('property_address') }}</span>
                            @endif --}}
                            <span class='text-danger error property_address'
                                style='display:none;font-size:11px;color:white;'></span>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            {!! Honeypot::generate('my_name', 'my_time') !!}
                            {{-- @if($errors->has('my_name'))
                            <span class="error">{{ $errors->first('my_name') }}</span>
                            @endif --}}
                            <span class='text-danger error my_time'
                                style='display:none;font-size:11px;color:white;'></span>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="control-label col-sm-2 col-md-2" for="ReCaptcha"></label>
                        {!! NoCaptcha::renderJs() !!}
                        {!! NoCaptcha::display() !!}

                        {{-- @if($errors->has('g-recaptcha-response'))
                        <small class="validation-error-message">{{ $errors->get('g-recaptcha-response')[0] }}</small>
                        @endif --}}
                        <span class='text-danger error g-recaptcha-response'
                            style='display:none;font-size:11px;color:white;'></span>
                    </div>
                    <div class="col-lg-12">
                        <div class="mesage-content">
                            Multi Dynamic Real Estate is one of the most trusted and fastest growing real estate
                            franchises in
                            Australia. Our dedicated, educated and hardworking Ingleburn team has a proven track record
                            of
                            results in serving our customers to buy, sell, rent and build their properties. You can be
                            assured
                            when you engage Multi Dynamic Ingleburn, you will find every solution to your real estate
                            requirements, because it’s our client's satisfaction which is the key to our success.
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <button class="btn btn-warning sendPropertyEvaluation" type="button">submit</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endif
<!-- end property evaluation block  -->
@stop