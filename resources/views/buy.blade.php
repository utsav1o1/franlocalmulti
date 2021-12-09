@extends('layouts.app')

@section('title', 'Buy properties')
@section('meta_keywords', env('APP_NAME'))
@section('meta_description', env('APP_NAME'))

@section('dynamicdata')

<div class="search-field-wrap">
    <div class="container">
        <div class="row">
            <div class="inner-menu-bg col-md-12">
                <ul class="nav nav-tabs">
                    @foreach($categories as $index=>$pcatgory)
                    <li @if($slug==$pcatgory->slug) class="active" @endif>
                        <a data-toggle="tab" href="#{!! $pcatgory->slug !!}">{!! ucwords($pcatgory->name) !!}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="clearfix tab-content">
                @foreach($categories as $index=>$pcatgory)
                <div id="{!! $pcatgory->slug !!}"
                    class="tab-pane fade in @if($slug == $pcatgory->slug) {{ 'active' }} @endif">
                    <form method="get" action="{!! route('properties.buy', $pcatgory->slug) !!}"
                        class="clearfix form-group-lg">
                        @include('layouts.buy-search')
                    </form>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!--Result Part-->
<div class="container">
    <!-- <div><h1>Title</h1></div> -->
    <div class="row">
        <div class="">
            <div class="row">
                <div class="search-result">
                    <!--Search Result Heading-->
                    <div class="row">
                        <div class="main-title">
                            <h1>@if($category) {!! $category->name !!} @else {{ 'Search Results' }} @endif</h1>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <center>
                                <font color="#0c5aa0">
                                    @if($category)
                                    <h4 align="center" style="margin:0px; padding: 0px;"><b>{!!
                                            $category->short_description !!}</b></h4>
                                    @endif
                                </font>
                            </center>
                        </div>
                        <div class="col-sm-12 col-md-12 inner-search-row">
                            <div class="land-search">
                                <h1>Search Result</h1>
                            </div>
                            <!-- <div class="main-title">
                                    <h1>@if($category) {!!  $category->property_category !!} @else {{ 'Search Results' }} @endif</h1>
                                </div>-->

                            {{-- <div class="">
                                <button type="button" class="btn btn-default btn-sm signintosave">
                                    <span class="glyphicon glyphicon-log-in"></span>Sign in to save this search
                                </button>
                            </div> --}}
                        </div>
                    </div>

                    <div class="tab-content">
                        <div id="allproperties" class="tab-pane fade in active">
                            @foreach($properties as $property)
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="thumbnail">
                                    <div class="thumbnail recent-properties-box">
                                        <a class="thumbnail-container"
                                            href="{!! route('properties.show', $property->slug) !!}">

                                            <img src="{!! url($property->getCoverImage()) !!}"
                                                alt="{!! $property->name !!}" class="img-responsive" />
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
                                                    <div class="property-area">{!! $property->property_type_name !!}
                                                    </div>
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
                                                    <p class="item-area">@if($property->area > 0) {!! $property->area
                                                        !!} m<sup>2</sup>@else --.-- @endif</p>
                                                </li>

                                                <li>
                                                    <p class="item-bed">{!! $property->number_of_bedrooms !!} Bedroom
                                                    </p>
                                                </li>
                                                <li>
                                                    <p class="item-bath">{!! $property->number_of_bathrooms !!} Bathroom
                                                    </p>
                                                </li>
                                                <li>
                                                    <p class="item-garage">{!! $property->number_of_garages !!} Garage
                                                    </p>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                            <div class="detail-footer">
                                                <a href="{!! route('properties.show', $property->slug) !!}"><i
                                                        class="fa-user"></i> {{ $property->agents_count }} {{
                                                    ($property->agents_count < 2) ? 'agent' : 'agents' }}</a>
                                                        <span><i class="fa-calendar-o"></i>{!!
                                                            App\Http\Helper::time_elapsed_string($property->created_at)
                                                            !!}</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                {!! $properties->appends($requestData)->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--SIDEBAR COLUMN-->

    </div>
</div>
@stop