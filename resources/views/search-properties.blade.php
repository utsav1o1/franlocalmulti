@extends('layouts.app')

@section('title', 'Search Page')
@section('meta_keywords', env('APP_NAME'))
@section('meta_description', env('APP_NAME'))

@section('dynamicdata')

    <!--START OF BODY PART-->
    <div class="row">
        <div class="middle-wrapper">
            <div class="container">
                <div class="main-title">
                    <h1>SEARCH RESULT : {{count($properties)}} properties found</h1>
                    <div class="border">
                        <div class="border-inner"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(count($properties) > 0)

    @foreach($properties->chunk(3) as $chunks)
        <div class="row">
            <div class="container">
                @foreach($chunks as $property)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="thumbnail">
                            <div class="thumbnail recent-properties-box">
                                <a class="thumbnail-container" href="{!! route('properties.show', $property->slug) !!}">

                                        <img src="{!! url($property->getCoverImage()) !!}"
                                             alt="{!! $property->name !!}"
                                             class="img-responsive"/>
                                </a>
                                @if($property->contractType)
                                    <span class="properties__ribon">{!! $property->contractType->heading !!}</span>
                            @endif
                            <!--Caption Detail-->
                            <div class="caption detail">
                                <header>
                                    <div class="pull-left">
                                        <h1 class="title">
                                            <a href="{!! route('properties.show', $property->slug) !!}">{!!
                                                                        str_limit($property->street_number.' '.$property->street.' '.$property->location_short_name,30)
                                                                !!}</a>
                                        </h1>
                                    </div>
                                    {{--<div class="price">${!! $property->price !!}</div>--}}
                                    <div class="price-block">
                                        <div class="starting-price">{!! $property->price_type_name !!}</div>
                                        <div class="price">
                                            <?php if(is_null($property->price_view)) {?>
                                            {{ $property->getFormattedPrice() }}
                                            <?php }
                                            else { ?>
                                            <span style="font-size: 12px">{{ str_limit( $property->price_view,22)}}</span>
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
                                        <p class="item-area">@if($property->area > 0) {!! $property->area !!} m<sup>2</sup>@else --.-- @endif</p>
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
                                    <a href="{!! route('properties.show', $property->slug) !!}"><i class="fa-user"></i> {{ $property->agents_count }} {{ ($property->agents_count < 2) ? 'agent' : 'agents' }}</a>
                                    <span><i class="fa-calendar-o"></i>{!! App\Http\Helper::time_elapsed_string($property->created_at) !!}</span>
                                </div>

                            </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
    <div class="row">
        <div class="container">
            {!! $properties->appends($requestData)->render() !!}
        </div>
    </div>
    <div class="clearfix"></div>

    @else
        <div class="row" style="min-height:25vh;">
            <div class="container">
                Properties does not found with your search.
            </div>
        </div>
        <div class="clearfix"></div>
    @endif

@stop