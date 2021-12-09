@extends('layouts.app')

@section('title', 'Rent')
@section('meta_keywords', env('APP_NAME'))
@section('meta_description', env('APP_NAME'))

@section('dynamicdata')


    <!--Result Part-->
    <div class="container">


        <div class="row">

            <div class="">
                <div class="row">
                    <div class="search-result">
                        <!--Search Result Heading-->

                        <div class="inner-search-row">
                            <div class="col-sm-12 col-md-12">
                                <div class="col-sm-12 col-md-12">
                                    <font color="#f26522">
                                        <h1 class="rent-resi">
                                            <b>Leased Properties</b>
                                        </h1>
                                    </font>
                                    <h4>
                                        <center><p><font color="#0c5aa0"><b>"Multi Dynamic Property Management
                                                        Team has been managing Australia's Property to its
                                                        best"</b> </font>

                                            </p></center>
                                    </h4>
                                </div>

                            </div>
                        </div>

                        <div class="tab-content">
                            <div id="allproperties" class="tab-pane fade in active">
                                @foreach($properties as $property)
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
                                                        <div class="pull-left inner-pull-left">
                                                            <h1 class="title">
                                                                <a href="{!! route('properties.show', $property->slug) !!}">{!!
                                                                        str_limit($property->street_number.' '.$property->street.' '.$property->location_short_name,30)
                                                                !!}</a>
                                                            </h1>
                                                        </div>

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
                                                        <a href="#"><i class="fa-user"></i> {{ $property->agents_count }} {{ ($property->agents_count < 2) ? 'agent' : 'agents' }}</a>
                                                        <span><i class="fa-calendar-o"></i>{!! App\Http\Helper::time_elapsed_string($property->created_at) !!}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>


                            <div class="col-lg-12 col-md-12 col-sm-12">
                                {!! $properties->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--SIDEBAR COLUMN-->
        </div>
    </div>
@stop