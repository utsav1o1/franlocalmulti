@extends('layouts.app')

@section('title', 'Properties')
@section('meta_keywords', env('APP_NAME'))
@section('meta_description', env('APP_NAME'))

@section('dynamicdata')
    <!--START OF BODY PART-->
    <div class="row">
        <div class="middle-wrapper">
            <div class="container">
                <div class="main-title">
                    <h1>PROPERTIES</h1>
                    <div class="border">
                        <div class="border-inner"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach($properties->chunk(3) as $chunks)
        <div class="row">
            <div class="container">
                @foreach($chunks as $property)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="thumbnail">
                            <div class="thumbnail recent-properties-box">
                                <a class="thumbnail-container" href="{!! route('properties.show', $property->slug) !!}">
                                @if($property->coverImage)
                                    @if(file_exists('storage/properties/'.$property->id.'/'.$property->coverImage->thumb_attachment ) && $property->coverImage->thumb_attachment != '')
                                        <img src="{!! asset('storage/properties/'.$property->id.'/'.$property->coverImage->thumb_attachment) !!}" alt="{!! $property->property_name !!}" class="img-responsive"/>
                                    @else
                                        <img src="{!! asset('images/appartment.jpg') !!}" alt="{!! $property->property_name !!}" class="img-responsive"/>
                                    @endif
                                @else
                                    <img src="{!! asset('images/appartment.jpg') !!}" alt="{!! $property->property_name !!}" class="img-responsive"/>
                                @endif
                                </a>
                                @if($property->contractType)
                                    <span class="properties__ribon">{!! $property->contractType->heading !!}</span>
                                @endif
                            <!--Caption Detail-->
                                <div class="caption detail">
                                    <header>
                                        <div class="pull-left">
                                            <h1 class="title">
                                                <a href="{!! route('properties.show', $property->slug) !!}">{!! $property->property_name !!}</a>
                                            </h1>
                                        </div>
                                        <div class="price">
                                            {{ $property->getFormattedPrice() }}
                                        </div>
                                        
                                        <div class="price-block">
                                            <div class="starting-price"></div>
                                            <div class="st-price">{!! $property->priceType ? $property->priceType->heading : '' !!}</div>
                                        </div>
                                        <div class="area-block">
                                            <div class="property-type">Property Type</div>
                                            <div class="property-area">{!! $property->propertyType ? $property->propertyType->property_type : '' !!}</div>
                                        </div>
                                    </header>
                                    <!--Location-->
                                    <h3 class="location">
                                        @if($property->location)
                                            <a href="#">
                                                <i class="fa fa-map-marker"></i>{!! $property->location->location_name !!}
                                            </a>
                                        @endif
                                    </h3>
                                    <!--Item Details-->
                                    <ul class="item-details">
                                        <li>
                                            <p class="item-area">@if($property->area > 0) {!! $property->area !!} m<sup>2</sup>@else N/A @endif</p>
                                        </li>
                                        @if($property->category)
                                        @if($property->category->slug != 'land')
                                        <li>
                                            <p class="item-bed">{!! $property->number_of_bedrooms !!} Bedroom</p>
                                        </li>
                                        <li>
                                            <p class="item-bath">{!! $property->number_of_bathrooms !!} Bathroom</p>
                                        </li>
                                        <li>
                                            <p class="item-garage">{!! $property->number_of_garages !!} Garage</p>
                                        </li>
                                        @endif
                                        @endif
                                    </ul>
                                    <div class="detail-footer">
                                        @if($property->agent)
                                            <a href="{!! route('properties.show', $property->slug) !!}"><i class="fa-user"></i> {!! $property->agent->first_name.' '.$property->agent->last_name !!}</a>
                                        @endif
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
            {!! $properties->render() !!}
        </div>
    </div>
    <div class="clearfix"></div>
@stop